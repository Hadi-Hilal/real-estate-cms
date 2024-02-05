<?php

namespace Modules\Blog\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Modules\Blog\app\Http\Requests\BlogCategoryRequest;
use Modules\Blog\app\Models\BlogCategory;

class CategoreyController extends Controller
{

    public function index()
    {
        $this->setActive('blogs');
        $this->setActive('categories');
        $categories = BlogCategory::paginate($this->pageSize());
        return view('blog::admin.categories.index', compact('categories'));
    }

    public function store(BlogCategoryRequest $request): RedirectResponse
    {
        try {
            BlogCategory::create($request->all());
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }


    public function update(BlogCategoryRequest $request, BlogCategory $category): RedirectResponse
    {
        try {
            $category->update($request->all());
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }

    public function deleteMulti(): RedirectResponse
    {
        $ids = request()->input('ids');
        try {
            BlogCategory::destroy($ids);
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }


}
