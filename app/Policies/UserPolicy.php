<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function isProf(User $user)
    {
        return $user->role === 'professeur';
    }

    public function isEleve(User $user)
    {
        return $user->role === 'eleve';
    }
}
