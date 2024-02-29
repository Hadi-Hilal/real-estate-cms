<?php

namespace Modules\Subscriber\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Subscriber\app\Http\Requests\SubscribeRequest;
use Modules\Subscriber\app\Models\Subscriber;

class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request)
    {
        Subscriber::create(['email' => $request->input('email')]);
        session()->flash('success', __('Thanks For Subscription'));
        return back();
    }
}
