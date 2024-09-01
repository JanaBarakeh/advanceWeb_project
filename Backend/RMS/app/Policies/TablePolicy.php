<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class TablePolicy
{
    public function viewAny(User $user) : Response
    {
        return $user->role->name === 'staff'
            ? Response::allow()
            : Response::deny('You do not have permission.');
    }
}
