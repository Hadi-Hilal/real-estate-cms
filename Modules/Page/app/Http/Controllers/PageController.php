<?php

namespace Modules\Page\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Core\app\Models\Country;
use Modules\Page\app\Models\Page;
use Modules\Settings\app\Models\Settings;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('publish', 'published')->whereSlug($slug)->firstOrFail();

        if (!session()->has('pages') || session('pages') !== $page->id) {

            $page->visites++;
            $page->save();
            session()->put('pages', $page->id);
        }

        $countries = Country::withoutGlobalScope('active')->select('phonecode', 'iso_code_2')->get();
        return view('page::index', compact('page', 'countries'));
    }
}
