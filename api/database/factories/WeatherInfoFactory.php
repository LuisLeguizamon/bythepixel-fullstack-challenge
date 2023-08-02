<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WeatherInfo>
 */
class WeatherInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();

        return [
            'user_id' => $user->id,
            'temperature_in_kelvin' => '300',
            'location' => 'Asunción',
            'description' => 'Sunny',
            'feels_like_in_kelvin' => '301',
            'humidity' => '10'
        ];
    }
}
