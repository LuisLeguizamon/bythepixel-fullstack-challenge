<?php

namespace App\Actions;

use App\DataTransferObjects\Weather\WeatherInfoDataFactory;
use App\Models\User;
use App\Services\WeatherAPI\GetWeatherByLocationService;

class ProcessWeatherInfoAction
{
    public function __invoke(int $userId): void
    {
        $user = User::find($userId);
        $response = (new GetWeatherByLocationService)->execute($user->latitude, $user->longitude);
        $weatherInfoData = (new WeatherInfoDataFactory)->fromApiResponse($userId, $response);
        (new CreateOrUpdateWeatherInfoAction)($weatherInfoData);
    }
}