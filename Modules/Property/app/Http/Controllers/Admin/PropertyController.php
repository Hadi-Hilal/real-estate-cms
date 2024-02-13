<?php

namespace Modules\Property\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Core\app\Models\City;
use Modules\Core\app\Models\Country;
use Modules\Core\app\Models\State;
use Modules\Property\app\Http\Requests\PropertyRequest;
use Modules\Property\app\Models\Property;
use Modules\Property\app\Models\PropertyFeature;
use Modules\Property\app\Models\PropertyType;
use Modules\Property\app\Repositories\PropertyRepository;

class PropertyController extends Controller
{
    public function __construct(protected PropertyRepository $propertyRepository)
    {
        $this->setActive('properties');
        $this->setActive('properties_lists');
    }

    public function index(Request $request)
    {
        $countries = Country::all();
        $properties = $this->propertyRepository->paginate($request);
        return view('property::admin.properties.index', compact('properties' , 'countries'));
    }

    public function create()
    {
        $propertiesTypes = PropertyType::all();
        $propertiesFeatures = PropertyFeature::all();
        $countries = Country::all();
        return view('property::admin.properties.create', compact('countries', 'propertiesTypes', 'propertiesFeatures'));
    }

    public function store(PropertyRequest $request): RedirectResponse
    {
        $this->flushMessage($this->propertyRepository->store($request));
        return redirect()->to(route('admin.properties.lists.index'));
    }

    public function edit(Property $list)
    {
        $property = $list;
        $propertiesTypes = PropertyType::all();
        $propertiesFeatures = PropertyFeature::all();
        $countries = Country::all();
        return view('property::admin.properties.edit', compact('property', 'countries', 'propertiesTypes', 'propertiesFeatures'));
    }

    public function update(PropertyRequest $request, Property $list): RedirectResponse
    {
        $this->flushMessage($this->propertyRepository->update($request, $list));
        return redirect()->to(route('admin.properties.lists.index'));
    }


    public function deleteMulti()
    {
        $ids = request()->input('ids');
        $this->flushMessage($this->propertyRepository->deleteMulti($ids));
        return redirect()->to(route('admin.properties.lists.index'));
    }


}
