<?php

namespace Tests\Feature\WeatherInfo;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherInfoIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_a_successful_response()
    {
        $response = $this->get('/users/weather-info');

        $response->assertStatus(200);
    }
}
