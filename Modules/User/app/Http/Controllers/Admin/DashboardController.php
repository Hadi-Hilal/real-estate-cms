<?php

namespace Modules\User\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user::admin.dashboard');
    }

}
