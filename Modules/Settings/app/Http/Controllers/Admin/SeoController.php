<?php

namespace Modules\Settings\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Settings\app\Models\Seo;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->setActive('settings');
    }

    public function index()
    {
        $this->setActive('website_seo');
        $seo = Seo::pluck('value', 'key');
        return view('settings::admin.seo_index', compact('seo'));
    }


    public function store(Request $request)
    {
        foreach ($request['data'] as $key => $value) {
            Seo::set($key, $value);
        }
        session()->flash('success', __('Configuration Updated Successfully'));
        return redirect()->back();
    }
}
