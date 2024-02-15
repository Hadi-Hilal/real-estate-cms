<?php

namespace Modules\Land\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Modules\Land\app\Http\Requests\LandFeatureRequest;
use Modules\Land\app\Models\LandFeature;

class LandFeatureController extends Controller
{
    public function __construct()
    {
        $this->setActive('lands');
        $this->setActive('lands_features');
    }

    public function index()
    {
        $features = LandFeature::with('lands')->paginate($this->pageSize());

        return view('land::admin.features.index', compact('features'));
    }


    public function store(LandFeatureRequest $request): RedirectResponse
    {
        try {
            LandFeature::create($request->all());
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }

    public function update(LandFeature $request, LandFeature $feature): RedirectResponse
    {
     //   try {
            $feature->update($request->all());
            $this->flushMessage(true);
//        } catch (Exception $exception) {
//            session()->flash('error', $exception->getMessage());
//        }
        return back();
    }


    public function deleteMulti()
    {
        $ids = request()->input('ids');
        try {
            LandFeature::destroy($ids);
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }
}
