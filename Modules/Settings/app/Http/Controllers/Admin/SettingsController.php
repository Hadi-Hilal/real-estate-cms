<?php

namespace Modules\Settings\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Core\app\Traits\FileTrait;
use Modules\Settings\app\Models\Settings;

class SettingsController extends Controller
{

    use FileTrait;

    public function __construct()
    {
        $this->setActive('settings');
    }

    public function index()
    {
        $this->setActive('website_settings');
        $settings = Settings::pluck('value', 'key');
        return view('settings::admin.settings_index', compact('settings'));
    }


    public function store(Request $request)
    {

        if ($request->has('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $key => $file) {
                $old_file = null;
                if (Settings::get($key)) {
                    $old_file = Settings::get($key);
                }

                $path = $this->upload($file, 'settings', $key, $old_file);

                Settings::set($key, $path);
            }
        }
        foreach ($request['data'] as $key => $value) {
            Settings::set($key, $value);
        }
        cache()->forget('settings');
        session()->flash('success', __('Configuration Updated Successfully'));
        return back();
    }


}
