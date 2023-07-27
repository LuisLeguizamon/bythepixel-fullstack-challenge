<?php

namespace App\DataTransferObjects\Weather;

class WeatherInfoData
{
    public function __construct(
        public readonly int $userId,
        public readonly string $temperatureInKelvin,
        public readonly ?string $location
    )
    {}
}