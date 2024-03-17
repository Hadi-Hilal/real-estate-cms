<?php

namespace Modules\Blog\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Blog\app\Models\BlogCategory;
use Modules\Blog\app\Models\BlogPost;
use Modules\Core\app\Models\Country;
use Modules\Settings\app\Models\Settings;

class ArticleController extends Controller
{
    public function index(Request $request, string $country = "turkey")
    {
        $posts = BlogPost::published()->country($country)->when($request->has('cat'), function ($q) use ($request) {
            $category = BlogCategory::where('slug', $request->query('cat'))->first();
            if ($category) {
                $q->where('category_id', $category->id);
            }
        })->cardData()->latest()->paginate($this->pageSize());
        $categories = BlogCategory::countryFilter($country)->get();
        $settings = Settings::pluck('value', 'key');
        return view('blog::index', compact('posts', 'categories', 'settings'));
    }

    public function show($slug)
    {
        $post = BlogPost::published()->where('slug', $slug)->firstOrFail();
        if (!session()->has('posts') || session('posts') !== $post->id) {
            $post->visites++;
            $post->save();
            session()->put('posts', $post->id);
        }

        $posts = BlogPost::published()->where('category_id', $post->category_id)->orderBy('visites', 'DESC')->take(2)->get();
        $countries = Cache::rememberForever('countries', function () {
            return Country::withoutGlobalScope('active')->select('phonecode', 'iso_code_2')->get();
        });
        $settings = Settings::pluck('value', 'key');
        return view('blog::show', compact('post', 'countries', 'posts', 'settings'));
    }
}
