<?php

namespace App\Actions;

use App\Jobs\Weather\ProcessWeatherInfoByUserJob;
use App\Models\User;

class CallProcessWeatherInfoForAllUsersAction
{
    public function __invoke()
    {
        $users = User::all();

        foreach ($users as $user) {
            ProcessWeatherInfoByUserJob::dispatch($user);
        }
    }
}