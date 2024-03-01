<?php

namespace Modules\Blog\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\app\Models\BlogCategory;
use Modules\Blog\app\Models\BlogPost;
use Modules\Core\app\Models\Country;


class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $posts = BlogPost::published()->when($request->has('cat'), function ($q) use ($request) {
                $category = BlogCategory::where('slug', $request->query('cat'))->first();
                if ($category) {
                    $q->where('category_id', $category->id);
                }
            })->cardData()->paginate($this->pageSize());
        $categories = BlogCategory::all();
        return view('blog::index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = BlogPost::published()->where('slug' , $slug)->firstOrFail();
        if (!session()->has('posts') || session('posts') !== $post->id) {

            $post->visites++;
            $post->save();
            session()->put('posts', $post->id);
        }

        $posts = BlogPost::where('category_id' ,$post->category_id)->orderBy('visites' , 'DESC') ->take(2)->get();
        $countries = Country::withoutGlobalScope('active')->select('phonecode', 'iso_code_2')->get();
        return view('blog::show', compact('post', 'countries' , 'posts'));
    }
}
