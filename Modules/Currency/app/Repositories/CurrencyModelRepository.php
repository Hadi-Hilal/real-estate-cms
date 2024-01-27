<?php

namespace Modules\Currency\app\Repositories;

use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use Modules\Core\app\Traits\FileTrait;
use Modules\Currency\app\Http\Requests\CurrencyRequest;
use Modules\Currency\app\Models\Currency;
use Modules\Currency\app\Services\CurrencyService;

class CurrencyModelRepository implements CurrencyRepository
{

    use FileTrait;

    private string $uploadPath = 'currencies';

    public function paginate(array $columns = ['*']): LengthAwarePaginator
    {
        return Currency::select($columns)->paginate(Config::get('core.page_size'));
    }

    public function store(CurrencyRequest $request): bool
    {
        $path = $this->upload($request->file('img'), $this->uploadPath, $request->code);
        $request->merge(['image' => $path]);
        try {
            Currency::create($request->all());
            (new CurrencyService())->updateExchangeRatesFromApi();
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function update(CurrencyRequest $request, Currency $currency): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->uploadPath, $request->code, $currency->image);
            $request->merge(['image' => $path,]);
        }
        try {
            $currency->update($request->all());
            (new CurrencyService())->updateExchangeRatesFromApi();
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function deleteMulti(array $ids): bool
    {
        try {
            $currencyImages = Currency::whereIn('id', $ids)->pluck('image')->toArray();
            Currency::destroy($ids);
            $this->deleteFile($currencyImages);
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

}
