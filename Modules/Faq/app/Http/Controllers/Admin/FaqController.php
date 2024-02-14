<?php

namespace Modules\Faq\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Modules\Faq\app\Http\Requests\FaqRequest;
use Modules\Faq\app\Models\Faq;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->setActive('faqs');
    }

    public function index()
    {
        $faqs = Faq::paginate($this->pageSize());
        return view('faq::admin.index', compact('faqs'));
    }

    public function store(FaqRequest $request): RedirectResponse
    {
        $request->merge([
            'publish' => $request->has('publish') ? 'published' : 'archived',
            'citizenship' => $request->has('citizenship') ? 1 : 0
        ]);
        try {
            Faq::create($request->all());
            cache()->forget('faqs');
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back()->withInput();
        }
        session()->flash('success', __('The Opreation Done Successfully'));
        return redirect()->to(route('admin.faqs.index'));
    }

    public function create()
    {
        return view('faq::admin.create');
    }

    public function edit(Faq $faq)
    {
        return view('faq::admin.edit', compact('faq'));
    }

    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        $request->merge([
            'publish' => $request->has('publish') ? 'published' : 'archived',
            'citizenship' => $request->has('citizenship') ? 1 : 0
        ]);
        try {
            $faq->update($request->all());
            cache()->forget('faqs');
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back()->withInput();
        }
        session()->flash('success', __('The Opreation Done Successfully'));
        return redirect()->to(route('admin.faqs.index'));
    }


    public function deleteMulti(): RedirectResponse
    {
        $ids = request()->input('ids');
        try {
            Faq::destroy($ids);
            cache()->forget('faqs');
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back()->withInput();
        }
        session()->flash('success', __('The Opreation Done Successfully'));
        return redirect()->to(route('admin.faqs.index'));
    }
}
