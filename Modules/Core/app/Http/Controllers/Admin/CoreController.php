<?php

namespace Modules\Core\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('core::index');
    }

}
