<?php

namespace App\Actions;

use App\Models\User;

class FetchUserByIdAction
{
    public function __invoke(int $userId): User
    {
        return User::find($userId);
    }
}
