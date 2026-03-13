<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy extends SnipePermissionsPolicy
{
    protected function columnName()
    {
        return 'users';
    }

    public function manageContactInfo(User $user)
    {
        return $user->hasAccess('users.contact');
    }
}
