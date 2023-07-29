<?php

namespace App\Actions;

use App\DataTransferObjects\Weather\WeatherInfoData;
use App\Models\WeatherInfo;

class CreateOrUpdateWeatherInfoAction
{
    public function __invoke(WeatherInfoData $weatherInfoData): void
    {
        $weatherInfo = WeatherInfo::where('user_id', $weatherInfoData->userId)->first();
        if (isset($weatherInfo)) {
            (new UpdateWeatherInfoAction)($weatherInfo, $weatherInfoData);
        } else {
            (new CreateWeatherInfoAction)($weatherInfoData);
        }
    }
}