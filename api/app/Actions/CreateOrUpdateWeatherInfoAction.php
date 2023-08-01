<?php

namespace App\Actions;

use App\DataTransferObjects\Weather\WeatherInfoData;
use App\Models\WeatherInfo;

class CreateOrUpdateWeatherInfoAction
{
    public function __invoke(WeatherInfoData $weatherInfoData): void
    {
        $weatherInfo = (new FetchWeatherInfoByUserId)($weatherInfoData->userId);
        if (isset($weatherInfo)) {
            (new UpdateWeatherInfoAction)($weatherInfo, $weatherInfoData);
        } else {
            (new CreateWeatherInfoAction)($weatherInfoData);
        }
    }
}