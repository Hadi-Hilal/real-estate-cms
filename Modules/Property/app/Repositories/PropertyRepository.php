<?php

namespace Modules\Property\app\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Property\app\Http\Requests\PropertyRequest;
use Modules\Property\app\Models\Property;

interface PropertyRepository
{
    function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator;

    function store(PropertyRequest $request): bool;

    function update(PropertyRequest $request, Property $property): bool;

    function deleteMulti(array $ids): bool;
}
