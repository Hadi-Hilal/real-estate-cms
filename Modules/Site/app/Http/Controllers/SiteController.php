<?php

namespace Modules\Site\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class SiteController extends Controller
{

    public function index()
    {
        return Inertia::render('Welcome', [
        ]);
    }

}
