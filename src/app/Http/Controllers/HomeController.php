<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Dini108\CurrencyConverter\CurrencyConverter;
use Dini108\CurrencyConverter\Provider\CurrencyConverterProvider;

class HomeController extends Controller
{
    public function index()
    {
        return view("index");
    }
}
