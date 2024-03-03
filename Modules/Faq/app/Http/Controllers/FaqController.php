<?php

namespace Modules\Faq\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Core\app\Models\Country;
use Modules\Faq\app\Models\Faq;

class FaqController extends Controller
{

    public function index()
    {
        $countries = Cache::rememberForever('countries', function () {
            return Country::withoutGlobalScope('active')->select('phonecode', 'iso_code_2')->get();
        });
        $faqs = Faq::published()->get();
        return view('faq::index', compact('countries', 'faqs'));
    }
}
