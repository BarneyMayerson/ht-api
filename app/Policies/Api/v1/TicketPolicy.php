<?php

declare(strict_types=1);

namespace App\Policies\Api\v1;

use App\Models\Ticket;
use App\Models\User;
use App\Permissions\Api\v1\Abilities;

class TicketPolicy
{
    public function store(User $user): bool
    {
        return $user->tokenCan(Abilities::CreateTicket) || $user->tokenCan(Abilities::CreateOwnTicket);
    }

    public function update(User $user, Ticket $ticket): bool
    {
        if ($user->tokenCan(Abilities::UpdateTicket)) {
            return true;
        }

        if ($user->tokenCan(Abilities::UpdateOwnTicket)) {
            return $user->id === $ticket->user_id;
        }

        return false;
    }

    public function replace(User $user): bool
    {
        return $user->tokenCan(Abilities::ReplaceTicket);
    }

    public function delete(User $user, Ticket $ticket): bool
    {
        if ($user->tokenCan(Abilities::DeleteTicket)) {
            return true;
        }

        if ($user->tokenCan(Abilities::DeleteOwnTicket)) {
            return $user->id === $ticket->user_id;
        }

        return false;
    }
}
