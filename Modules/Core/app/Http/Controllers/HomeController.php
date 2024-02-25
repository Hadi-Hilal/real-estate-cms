<?php

namespace Modules\Core\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Blog\app\Models\BlogPost;
use Modules\Core\app\Models\Country;
use Modules\Land\app\Models\Land;
use Modules\Land\app\Models\LandType;
use Modules\Property\app\Models\Property;
use Modules\Settings\app\Models\Settings;

class HomeController extends Controller
{
    public function index()
    {
        $this->setActive('home');
        $settings = Cache::rememberForever('settings', function () {
            return Settings::pluck('value', 'key');
        });
        $countries = Cache::rememberForever('countries', function () {
            return Country::all();
        });
        $landTypes = Cache::rememberForever('landTypes', function () {
            return LandType::all();
        });
        $lands = Cache::rememberForever('lands', function () {
            return Land::featured()->cardData()->get();
        });
        $properties = Cache::rememberForever('properties', function () {
            return Property::featured()->cardData()->get();
        });

        $posts = Cache::rememberForever('posts ', function () {
            return BlogPost::featured()->cardData()->get();
        });

        return view('core::index', compact('settings', 'countries', 'landTypes', 'lands',
            'posts', 'properties'));
    }
}
