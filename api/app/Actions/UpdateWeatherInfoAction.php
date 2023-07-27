<?php

namespace App\Actions;

use App\DataTransferObjects\Weather\WeatherInfoData;
use App\Models\WeatherInfo;

class UpdateWeatherInfoAction
{
    public function __invoke(WeatherInfo $weatherInfo, WeatherInfoData $weatherInfoData)
    {
        $weatherInfo->user_id = $weatherInfoData->userId;
        $weatherInfo->temperature_in_kelvin = $weatherInfoData->temperatureInKelvin;
        $weatherInfo->location = $weatherInfoData->location;
        $weatherInfo->save();
    }
}