<?php

namespace Modules\Core\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Blog\app\Models\BlogPost;
use Modules\Core\app\Models\Country;
use Modules\Faq\app\Models\Faq;
use Modules\Land\app\Models\Land;
use Modules\Land\app\Models\LandType;
use Modules\Property\app\Models\Property;
use Modules\Settings\app\Models\Settings;
use Modules\Testimonial\app\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
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

        $testimonials = Cache::rememberForever('testimonials ', function () {
            return Testimonial::published()->get();
        });
        return view('core::index', compact('settings', 'countries', 'landTypes', 'lands',
            'posts', 'properties', 'testimonials'));
    }

    public function citizenship()
    {
        $settings = Cache::rememberForever('settings', function () {
            return Settings::pluck('value', 'key');
        });
        $properties = Property::where('citizenship', 1)->featured()->cardData()->get();
        $posts = BlogPost::where('citizenship', 1)->featured()->cardData()->get();
        $faqs = Faq::where('citizenship', 1)->published()->get();
        $countries = Country::withoutGlobalScope('active')->select('phonecode', 'iso_code_2')->get();
        $testimonials = Testimonial::where('citizenship', 1)->published()->get();
        return view('core::citizenship', compact('settings', 'properties', 'faqs', 'posts', 'countries', 'testimonials'));
    }
}
