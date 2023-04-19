<?php

namespace App\Policies;

use App\Models\SimCard;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SimCardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin', 'Reception']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SimCard $simCard): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin', 'Reception']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin', 'Reception']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SimCard $simCard): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin', 'Reception']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SimCard $simCard): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin', 'Reception']);
    }
}
