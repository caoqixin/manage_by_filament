<?php

namespace App\Policies;

use App\Models\Operator;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OperatorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Operator $operator): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Operator $operator): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Operator $operator): bool
    {
        return $user->hasAnyRole(['Super Admin', 'Admin']);
    }
}
