<?php

declare(strict_types=1);

namespace App\Policies\Api\v1;

use App\Models\User;
use App\Permissions\Api\v1\Abilities;

class UserPolicy
{
    public function store(User $user): bool
    {
        return $user->tokenCan(Abilities::CreateUser);
    }

    public function update(User $user): bool
    {
        return $user->tokenCan(Abilities::UpdateUser);
    }

    public function replace(User $user): bool
    {
        return $user->tokenCan(Abilities::ReplaceUser);
    }

    public function delete(User $user): bool
    {
        return $user->tokenCan(Abilities::DeleteUser);
    }
}
