<?php

namespace Modules\Property\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Modules\Property\app\Http\Requests\PropertyTypeRequest;
use Modules\Property\app\Models\PropertyType;

class PropertyTypeController extends Controller
{
    public function __construct()
    {
        $this->setActive('properties');
        $this->setActive('types');
    }

    public function index()
    {
        $types = PropertyType::with('properties')->paginate($this->pageSize());
        return view('property::admin.types.index', compact('types'));
    }


    public function store(PropertyTypeRequest $request): RedirectResponse
    {
        try {
            PropertyType::create($request->all());
            cache()->forget('propertyTypes');
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }

    public function update(PropertyTypeRequest $request, PropertyType $type): RedirectResponse
    {
        try {
            $type->update($request->all());
            cache()->forget('propertyTypes');
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
            PropertyType::destroy($ids);
            cache()->forget('propertyTypes');
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }
}
