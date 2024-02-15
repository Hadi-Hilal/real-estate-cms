<?php

namespace Modules\Land\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Modules\Land\app\Http\Requests\LandTypeRequest;
use Modules\Land\app\Models\LandType;

class LandTypeController extends Controller
{
    public function __construct()
    {
        $this->setActive('lands');
        $this->setActive('lands_types');
    }

    public function index()
    {
        $types = LandType::with('lands')->paginate($this->pageSize());
        return view('land::admin.types.index', compact('types'));
    }

    public function store(LandTypeRequest $request): RedirectResponse
    {
        try {
            LandType::create($request->all());
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }

    public function update(LandTypeRequest $request, LandType $type): RedirectResponse
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
            LandType::destroy($ids);
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }
}
