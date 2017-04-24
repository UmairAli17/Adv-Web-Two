<?php

namespace App\Policies;

use App\User;
use App\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Allow only owner of order to delete order
     *
     * @return boolean
     */
    public function owns_order(User $user, Order $order)
    {
        if($user->owns($order))
        {
            return true;
        }
    }
}
