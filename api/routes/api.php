<?php

use App\Http\Controllers\Api\Weather\UserWeatherInfoController;
use App\Http\Controllers\Api\Weather\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::controller(UserWeatherInfoController::class)->group(function() {
    Route::get('/users/weather-info', 'index')->name('weather.index');
    Route::get('/users/{user}/weather-info', 'show')->name('weather.show');
});