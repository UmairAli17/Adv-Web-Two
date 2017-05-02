<?php

namespace App\Policies;

use App\User;
use App\Products;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductsPolicy
{
    use HandlesAuthorization;

    /**
     * 	Allow only User who is an owner of Product through a Business to
     * 	Access Action
     * @param  User     $user    [User Model]
     * @param  Products $product [Products Model]
     * @return [type]            [True: Give Access - Else, Deny]
     */
    public function shopkeeper(User $user, Products $product)
    {  
        if($user->isShopkeeperOf($product))
        {
            return true;
        }
    }
}
