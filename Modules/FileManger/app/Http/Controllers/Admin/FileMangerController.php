<?php

namespace Modules\FileManger\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FileMangerController extends Controller
{

    public function __construct(){
        $this->setActive('FileManger');
    }
    public function index()
    {
        return view('filemanger::admin.index');
    }

}
