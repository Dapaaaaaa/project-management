<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        function updateRole(User $user, User $targetUser)
    {
        // Cek apakah pengguna memiliki peran "tertinggi"
        return $user->hasRole('project-management');
    }
    }
}