<?php

namespace Modules\Contact\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::admin.index');
    }

}
