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
}
