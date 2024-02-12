<?php

namespace Modules\Property\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Modules\Property\app\Http\Requests\PropertyFeatureRequest;
use Modules\Property\app\Models\PropertyFeature;

class PropertyFeatureController extends Controller
{
    public function __construct()
    {
        $this->setActive('properties');
        $this->setActive('features');
    }

    public function index()
    {
        $features = PropertyFeature::with('properties')->paginate($this->pageSize());

        return view('property::admin.features.index', compact('features'));
    }


    public function store(PropertyFeatureRequest $request): RedirectResponse
    {
        try {
            PropertyFeature::create($request->all());
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }

    public function update(PropertyFeatureRequest $request, PropertyFeature $type): RedirectResponse
    {
        try {
            $type->update($request->all());
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }


    public function deleteMulti()
    {
        $ids = request()->input('ids');
        try {
            PropertyFeature::destroy($ids);
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }
}
