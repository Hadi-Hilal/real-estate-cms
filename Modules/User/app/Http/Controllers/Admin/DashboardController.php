<?php

namespace Modules\User\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\Blog\app\Models\BlogPost;
use Modules\Contact\app\Models\Contact;
use Modules\Land\app\Models\Land;
use Modules\Property\app\Models\Property;
use Modules\Subscriber\app\Models\Subscriber;

class DashboardController extends Controller
{
    public function index()
    {
        $lands = Land::all();
        $projects = Property::all();
        $posts = BlogPost::all();
        $pages = Property::all();
        $subscribers = Subscriber::count();
        $contacts = Contact::count();
        $users  = User::count();
        $admins  = User::type('admin')->count();

        return view('user::admin.dashboard' , compact('lands' ,'projects' , 'posts' , 'pages' , 'subscribers' , 'contacts' , 'users' , 'admins'));
    }

}
