<?php

namespace App\Policies;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReservationPolicy
{
    public function reserve(User $user): Response
    {

        return $user->role->name === 'customer'
            ? Response::allow()
            : Response::deny('Only customers can reserve tables');
    }

    public function viewAny(User $user): Response
    {
        return  $user->role->name === 'staff'
            ? Response::allow()
            : Response::deny('Only staff can view all reservations');
    }

    public function cancel(User $user, Reservation $reservation): bool
    {
        return $user->id === $reservation->user_id;
    }
}
