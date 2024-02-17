<?php

namespace Modules\Core\app\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends  Controller
{
    public function index(){
        $this->setActive('home');
        return view('core::index');
    }
}
