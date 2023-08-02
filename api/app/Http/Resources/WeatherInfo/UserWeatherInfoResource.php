<?php

namespace App\Http\Resources\WeatherInfo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserWeatherInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (!isset($this->weatherInfo)) {
            return [
                'user_id' => $this->id,
                'user_name' => $this->name,
            ];
        }
        return [
            'user_id' => $this->id,
            'user_name' => $this->name,
            'location' => $this->weatherInfo->location ? $this->weatherInfo->location : '------',
            'temperature_in_kelvin' => $this->weatherInfo->temperature_in_kelvin . ' K',
            'description' => ucfirst($this->weatherInfo->description),
            'feels_like_in_kelvin' => $this->weatherInfo->feels_like_in_kelvin . ' K',
            'humidity' => $this->weatherInfo->humidity . ' %',
            'is_cloudy' => $this->isCloudy(),
        ];
    }

    private function isCloudy()
    {
        if (stripos($this->weatherInfo->description, 'cloud') !== false) {
            return true;
        }
        return false;
    }
}
