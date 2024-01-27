<?php

namespace Modules\Testimonial\app\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Testimonial\app\Http\Requests\TestimonialRequest;
use Modules\Testimonial\app\Models\Testimonial;

interface TestimonialRepository
{
    function paginate(array $columns = ['*']): LengthAwarePaginator;

    function store(TestimonialRequest $request): bool;

    function update(TestimonialRequest $request, Testimonial $testimonial): bool;

    function deleteMulti(array $ids): bool;
}
