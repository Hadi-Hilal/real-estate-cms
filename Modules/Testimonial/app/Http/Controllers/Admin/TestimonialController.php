<?php

namespace Modules\Testimonial\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Core\app\Models\Country;
use Modules\Testimonial\app\Http\Requests\TestimonialRequest;
use Modules\Testimonial\app\Models\Testimonial;
use Modules\Testimonial\app\Repositories\TestimonialRepository;

class TestimonialController extends Controller
{

    public function __construct(public TestimonialRepository $testimonialRepository)
    {
        $this->setActive('testimonials');
    }

    public function index()
    {
        $testimonials = $this->testimonialRepository->paginate();
        return view('testimonial::admin.index', compact('testimonials'));
    }

    public function store(TestimonialRequest $request)
    {
        $this->flushMessage($this->testimonialRepository->store($request));
        return redirect()->to(route('admin.testimonials.index'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('testimonial::admin.create', compact('countries'));
    }

    public function edit(Testimonial $testimonial)
    {
        $countries = Country::all();
        return view('testimonial::admin.edit', compact('testimonial', 'countries'));
    }


    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        $this->flushMessage($this->testimonialRepository->update($request, $testimonial));
        return redirect()->to(route('admin.testimonials.index'));
    }


    public function deleteMulti(Request $request)
    {
        $ids = $request['ids'];
        $this->flushMessage($this->testimonialRepository->deleteMulti($ids));
        return redirect()->to(route('admin.testimonials.index'));
    }
}
