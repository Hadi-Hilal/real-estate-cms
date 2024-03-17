<?php

namespace Modules\Faq\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Core\app\Models\Country;
use Modules\Faq\app\Models\Faq;
use Modules\Settings\app\Models\Settings;

class FaqController extends Controller
{

    public function index(string $country = "turkey")
    {
        $countries = Cache::rememberForever('countries', function () {
            return Country::withoutGlobalScope('active')->select('phonecode', 'iso_code_2')->get();
        });
        $faqs = Faq::published()->country($country)->get();
        $settings = Settings::pluck('value', 'key');
        return view('faq::index', compact('countries', 'faqs', 'settings'));
    }
}
