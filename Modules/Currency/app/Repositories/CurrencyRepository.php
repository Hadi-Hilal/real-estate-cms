<?php

namespace Modules\Currency\app\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Currency\app\Http\Requests\CurrencyRequest;
use Modules\Currency\app\Models\Currency;

interface CurrencyRepository
{
    function paginate(array $columns = ['*']): LengthAwarePaginator;

    function store(CurrencyRequest $request): bool;

    function update(CurrencyRequest $request, Currency $testimonial): bool;

    function deleteMulti(array $ids): bool;
}
