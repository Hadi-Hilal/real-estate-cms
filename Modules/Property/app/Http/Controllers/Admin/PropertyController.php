<?php

namespace Modules\Property\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Core\app\Models\City;
use Modules\Core\app\Models\Country;
use Modules\Core\app\Models\State;
use Modules\Property\app\Http\Requests\PropertyRequest;
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
        $properties = $this->propertyRepository->paginate($request);
        return view('property::admin.properties.index', compact('properties'));
    }

    public function create(Request $request)
    {
        $propertiesTypes = PropertyType::all();
        $propertiesFeatures = PropertyFeature::all();
        $countries = Country::all();
        return view('property::admin.properties.create', compact('countries' , 'propertiesTypes' , 'propertiesFeatures'));
    }

    public function store(PropertyRequest $request): RedirectResponse
    {

        $this->flushMessage($this->propertyRepository->store($request));
        return redirect()->to(route('admin.properties.lists.index'));
    }

    public function update(PropertyRequest $request, PropertyType $type): RedirectResponse
    {
    }


    public function deleteMulti()
    {
        $ids = request()->input('ids');
    }

    public function getStates(){
        return State::where('country_id' , request()->input('countryId'))->pluck('name' , 'id');
    }

    public function getCities(){
        return City::where('state_id' , request()->input('stateId'))->pluck('name' , 'id');
    }
}
