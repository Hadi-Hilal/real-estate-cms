<?php

namespace Modules\Core\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Core\app\Models\City;
use Modules\Core\app\Models\Country;
use Modules\Land\app\Models\Land;
use Modules\Land\app\Models\LandType;
use Modules\Settings\app\Models\Settings;

class HomeController extends  Controller
{
    public function index(){
        $this->setActive('home');
        $settings = Cache::rememberForever('settings', function (){
            return Settings::pluck('value' , 'key');
        });
        $countries = Cache::rememberForever('countries', function (){
            return Country::all();
        });
        $cities = City::whereHas('lands')->get();

        $landsTypes = Cache::rememberForever('landsTypes', function (){
            return LandType::all();
        });

        $featuredLands = Cache::rememberForever('featuredLands', function (){
            return Land::featured()->cardData()->get();
        });


        return view('core::index' , compact('settings' , 'cities' , 'countries' , 'landsTypes' , 'featuredLands'));
    }
}
