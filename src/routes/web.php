<?php

use App\Http\Api\CurrencyController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::any('/', [HomeController::class, 'index']);

Route::get('currencies', [CurrencyController::class, 'currencies']);

Route::get('/rates/{fromRate}', [CurrencyController::class, 'rates']);

Route::post('convert', [CurrencyController::class, 'convert']);
