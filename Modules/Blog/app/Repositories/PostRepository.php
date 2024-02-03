<?php

namespace Modules\Blog\app\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Blog\app\Http\Requests\BlogPostRequest;
use Modules\Blog\app\Models\BlogPost;

interface PostRepository
{
    function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator;

    function store(BlogPostRequest $request): bool;

    function update(BlogPostRequest $request, BlogPost $post): bool;

    function deleteMulti(array $ids): bool;
}
