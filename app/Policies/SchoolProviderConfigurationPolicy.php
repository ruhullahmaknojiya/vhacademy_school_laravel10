<?php

namespace App\Policies;

use App\Models\SchoolProviderConfiguration;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolProviderConfigurationPolicy
{
    use HandlesAuthorization;

    public function view(User $user, SchoolProviderConfiguration $configuration)
    {
        return $user->school_id === $configuration->school_id;
    }

    public function create(User $user)
    {
        return $user->role === 'SuperAdmin';
    }

    public function update(User $user, SchoolProviderConfiguration $configuration)
    {
        return $user->school_id === $configuration->school_id;
    }

    public function delete(User $user, SchoolProviderConfiguration $configuration)
    {
        return $user->school_id === $configuration->school_id;
    }
}
