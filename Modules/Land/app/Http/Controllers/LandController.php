<?php

namespace Modules\Land\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Core\app\Models\Country;
use Modules\Land\app\Models\Land;
use Modules\Land\app\Models\LandType;

class LandController extends Controller
{
    public function index(Request $request, string $country = "turkey")
    {
        $lands = Land::published()->country($country)->cardData()->filter($request)->paginate($this->pageSize());
        $types = Cache::rememberForever('landTypes', function () {
            return LandType::all();
        });
        return view('land::index', compact('lands', 'types'));
    }

    public function show($slug)
    {
        $land = Land::published()->where('slug', $slug)->firstOrFail();
        if (!session()->has('lands') || session('lands') !== $land->id) {
            $land->visites++;
            $land->save();
            session()->put('lands', $land->id);
        }

        $lands = Land::published()->where('land_type_id', $land->land_type_id)
            ->where('country_id', $land->country_id)
            ->orderBy('visites', 'DESC')->take(2)->get();
        $countries = Cache::rememberForever('countries', function () {
            return Country::withoutGlobalScope('active')->select('phonecode', 'iso_code_2')->get();
        });
        return view('land::show', compact('lands', 'countries', 'land'));
    }
}
