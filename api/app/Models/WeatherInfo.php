<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherInfo extends Model
{
    use HasFactory;

    protected $table = 'weather_info';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTemperatureInCelsiusAttribute()
    {
        $temp = (float)$this->temperature_in_kelvin - 273.15;

        return round($temp, 0);
    }

    public function getFeelsLikeInCelsiusAttribute()
    {
        $temp = (float)$this->feels_like_in_kelvin - 273.15;

        return round($temp, 0);
    }
}
