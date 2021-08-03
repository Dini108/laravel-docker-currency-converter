<?php

namespace App\Http\Api;

use Dini108\CurrencyConverter\CurrencyConverter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;

class CurrencyController extends Controller
{
    private string $currency_converter_api_key;
    private string $exchange_rate_api_key;

    /**
     * CurrencyController constructor.
     */
    public function __construct()
    {
        $this->currency_converter_api_key = config('app.currency_converter_api_key');
        $this->exchange_rate_api_key = config('app.exchange_rates_api_key');
    }

    public function currencies()
    {
        $currencyConverter = new CurrencyConverter($this->exchange_rate_api_key);
        return JsonResource::make($currencyConverter->currencies());
    }

    public function rates($from)
    {
        $currencyConverter = new CurrencyConverter($this->exchange_rate_api_key);
        return JsonResource::make($currencyConverter->rate($from));
    }

    public function convert(Request $request){
        $currencyConverter = new CurrencyConverter($this->exchange_rate_api_key);
        return JsonResource::make($currencyConverter->from($request->from)
                                                    ->to($request->to)
                                                    ->convert($request->fromValue));
    }
}
