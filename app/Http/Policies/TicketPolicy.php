<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;

class TicketPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ticket $ticket): bool
    {
        // Admin can view all tickets
        if ($user->role === 'admin') {
            return true;
        }

        // Supplier can only view their own tickets
        return $user->id === $ticket->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ticket $ticket): bool
    {
        // Only supplier who created the ticket can update it
        // And only if it's still in draft status
        return $user->id === $ticket->user_id && $ticket->status === 'draft';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ticket $ticket): bool
    {
        // Only supplier who created the ticket can delete it
        // And only if it's still in draft status
        return $user->id === $ticket->user_id && $ticket->status === 'draft';
    }
}