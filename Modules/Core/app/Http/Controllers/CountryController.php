<?php

namespace Modules\Core\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Core\app\Models\City;
use Modules\Core\app\Models\State;

class CountryController extends Controller
{
    public function getStates()
    {
        return State::where('country_id', request()->input('countryId'))->pluck('name', 'id');
    }

    public function getCities()
    {
        return City::where('state_id', request()->input('stateId'))->pluck('name', 'id');
    }
}
