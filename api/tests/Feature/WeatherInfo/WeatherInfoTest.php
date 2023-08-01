<?php

namespace Tests\Feature\WeatherInfo;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherInfoTest extends TestCase
{
    public function test_weather_info_screen_can_be_rendered(): void
    {
        $response = $this->get('/users/weather-info');

        $response->assertStatus(200);
    }
}
