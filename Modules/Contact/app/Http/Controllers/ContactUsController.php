<?php

namespace Modules\Contact\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Modules\Contact\app\Http\Requests\ContactRequest;
use Modules\Contact\app\Models\Contact;
use Modules\Core\app\Models\Country;
use Modules\Settings\app\Models\Settings;

class ContactUsController extends Controller
{
    public function index()
    {
        $countries = Cache::rememberForever('countries', function () {
            return Country::withoutGlobalScope('active')->select('phonecode', 'iso_code_2')->get();
        });
        $settings = Cache::rememberForever('settings', fn() => tap(new Settings, function ($settings) {
            $settings->setCollection(Settings::all());
        }));
        return view('contact::index', compact('countries', 'settings'));
    }

    public function store(ContactRequest $request)
    {

        try {
            Contact::create($request->all());
            session()->flash('success', __('Thanks, We Will Contact You As Soon Possible'));
            session()->put('form-submited', true);
            return redirect()->to(route('thanks'));
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            $this->flushMessage(false);
        }
        return back();
    }

    public function thanks()
    {
        if (session()->has('form-submited')) {
            session()->forget('form-submited');
            return view('contact::thanks');
        }
        return redirect()->to(route('contact-us'));
    }
}
