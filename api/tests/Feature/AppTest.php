<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/users/weather-info');

        $response->assertStatus(200);
    }

    public function test_database_works()
    {
        User::factory(20)->create();

        $this->assertEquals(20, User::all()->count());
    }
}
