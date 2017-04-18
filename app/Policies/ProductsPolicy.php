<?php

namespace App\Policies;

use App\User;
use App\Products;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductsPolicy
{
    use HandlesAuthorization;

    public function shopkeeper(User $user, Products $product)
    {  
        if($user->isShopkeeperOf($product))
        {
            return true;
        }
    }
}
