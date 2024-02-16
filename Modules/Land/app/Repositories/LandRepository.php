<?php

namespace Modules\Land\app\Repositories;


use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Land\app\Http\Requests\LandRequest;
use Modules\Land\app\Models\Land;

interface LandRepository
{
    function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator;

    function store(LandRequest $request): bool;

    function update(LandRequest $request, Land $land): bool;

    function deleteMulti(array $ids): bool;
}
