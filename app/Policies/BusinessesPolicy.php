<?php

namespace App\Policies;

use App\User;
use App\Businesses;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusinessesPolicy
{
    use HandlesAuthorization;

    /**
     * If User Owns that Business - Allow Access
     *
     * @return void
     */
    public function access(User $user, Businesses $business)
    {
        if ($user->owns($business)) 
        {
            return true;
        }
    }
}
