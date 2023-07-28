<?php

namespace App\Http\Resources\WeatherInfo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersWeatherInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_name' => $this->name,
            'location' => $this->weatherInfo->location ? $this->weatherInfo->location : '------',
            'temperature_in_kelvin' => $this->weatherInfo->temperature_in_kelvin.' K',
        ];
    }
}
