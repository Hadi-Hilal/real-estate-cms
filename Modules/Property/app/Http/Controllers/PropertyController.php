<?php

namespace Modules\Property\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Core\app\Models\Country;
use Modules\Property\app\Models\Property;
use Modules\Property\app\Models\PropertyType;

class PropertyController extends Controller
{
    public function index(Request $request, string $country = "turkey", string $type = "project")
    {
        $properties = Property::published()->country($country)->type($type)->cardData()->filter($request)->paginate($this->pageSize());
        $types = Cache::rememberForever('propertyTypes', function () {
            return PropertyType::all();
        });
        return view('property::index', compact('properties', 'types'));
    }

    public function show($slug)
    {
        $property = Property::published()->where('slug', $slug)->firstOrFail();
        if (!session()->has('properties') || session('properties') !== $property->id) {
            $property->visites++;
            $property->save();
            session()->put('properties', $property->id);
        }

        $properties = Property::published()->where('property_type_id', $property->property_type_id)
            ->where('country_id', $property->country_id)
            ->orderBy('visites', 'DESC')->take(2)->get();
        $countries = Cache::rememberForever('countries', function () {
            return Country::withoutGlobalScope('active')->select('phonecode', 'iso_code_2')->get();
        });
        return view('property::show', compact('property', 'countries', 'properties'));
    }
}
