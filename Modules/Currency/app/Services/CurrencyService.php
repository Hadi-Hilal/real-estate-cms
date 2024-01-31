<?php

namespace Modules\Currency\app\Services;

use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Modules\Currency\app\Models\Currency;

class CurrencyService
{
    public function updateExchangeRatesFromApi()
    {
        try {
            $response = Http::get('http://data.fixer.io/api/latest?access_key=' . Config::get('currency.apiKey'));
            $json = $response->json();

            if ($json['success']) {
                $usd = $json['rates']['USD'];

                $currencies = Currency::all();

                $currencies->each(function ($currency) use ($json, $usd) {
                    if (isset($json['rates'][$currency->code])) {
                        $value = $json['rates'][$currency->code];
                        $currency->exchange_rate = $usd / $value;
                        $currency->save();
                    }
                });

                return true;
            } else {
                Log::error($json);
                return false;
            }
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            Log::error($exception->getMessage());
            return false;
        }
    }

}
