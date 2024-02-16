<?php

namespace Modules\Land\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Core\app\Models\Country;
use Modules\Land\app\Http\Requests\LandRequest;
use Modules\Land\app\Models\Land;
use Modules\Land\app\Models\LandFeature;
use Modules\Land\app\Models\LandType;
use Modules\Land\app\Repositories\LandRepository;

class LandController extends Controller
{
    public function __construct(protected LandRepository $landRepository)
    {
        $this->setActive('lands');
        $this->setActive('lands_lists');
    }

    public function index(Request $request)
    {
        $countries = Country::all();
        $lands = $this->landRepository->paginate($request);
        return view('land::admin.lands.index', compact('lands', 'countries'));
    }

    public function create()
    {
        $landTypes = LandType::all();
        $landFeatures = LandFeature::all();
        $countries = Country::all();
        return view('land::admin.lands.create', compact('countries', 'landTypes', 'landFeatures'));
    }

    public function store(LandRequest $request): RedirectResponse
    {
        $this->flushMessage($this->landRepository->store($request));
        return redirect()->to(route('admin.lands.lists.index'));
    }

    public function edit(Land $list)
    {
        $land = $list;
        $landTypes = LandType::all();
        $landFeatures = LandFeature::all();
        $countries = Country::all();
        return view('land::admin.lands.edit', compact('land', 'countries', 'landTypes', 'landFeatures'));
    }

    public function update(LandRequest $request, Land $list): RedirectResponse
    {
        $this->flushMessage($this->landRepository->update($request, $list));
        return redirect()->to(route('admin.lands.lists.index'));
    }


    public function deleteMulti()
    {
        $ids = request()->input('ids');
        $this->flushMessage($this->landRepository->deleteMulti($ids));
        return redirect()->to(route('admin.lands.lists.index'));
    }
}
