<?php

namespace Modules\Currency\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Currency\app\Http\Requests\CurrencyRequest;
use Modules\Currency\app\Models\Currency;
use Modules\Currency\app\Repositories\CurrencyRepository;

class CurrencyController extends Controller
{
    public function __construct(public CurrencyRepository $currencyRepository)
    {
        $this->setActive('currencies');
    }

    public function index()
    {
        $currencies = $this->currencyRepository->paginate();
        return view('currency::admin.index', compact('currencies'));
    }


    public function create()
    {
        return view('currency::admin.create');
    }


    public function store(CurrencyRequest $request): RedirectResponse
    {
        $this->flushMessage($this->currencyRepository->store($request));
        return redirect()->to(route('admin.currencies.index'));
    }

    public function edit(Currency $currency)
    {
        return view('currency::admin.edit', compact('currency'));
    }

    public function update(CurrencyRequest $request, Currency $currency): RedirectResponse
    {
        $this->flushMessage($this->currencyRepository->update($request, $currency));
        return redirect()->to(route('admin.currencies.index'));
    }


    public function deleteMulti()
    {
        $ids = request()->input('ids');
        $this->flushMessage($this->currencyRepository->deleteMulti($ids));
        return redirect()->to(route('admin.currencies.index'));
    }
}
