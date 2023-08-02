<?php

namespace Tests\Feature\WeatherInfo;

use App\Actions\CreateWeatherInfoAction;
use App\DataTransferObjects\Weather\WeatherInfoData;
use App\Models\User;
use App\Models\WeatherInfo;
use Database\Factories\WeatherInfoFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class WeatherInfoShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_weather_info()
    {
        $weatherInfo = WeatherInfo::factory()->create();
        $user = $weatherInfo->user;

        $response = $this->getJson('/users/' . $user->id . '/weather-info');

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(function (AssertableJson $json) use ($user) {
                $json->has('data', function (AssertableJson $json) use ($user) {
                    $json->whereAllType([
                        'user_id' => 'integer',
                        'user_name' => 'string',
                        'location' => 'string',
                        'temperature_in_kelvin' => 'string',
                        'temperature_in_celsius' => 'string',
                        'description' => 'string',
                        'feels_like_in_kelvin' => 'string',
                        'feels_like_in_celsius' => 'string',
                        'humidity' => 'string',
                        'is_cloudy' => 'boolean',
                    ])
                        ->where('user_id', $user->id);
                });
            });
    }
}
