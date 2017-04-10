<?php

namespace App\Listeners;

use App\Events\ShopkeeperRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Businesses;
class CreateShopBusinessAfterKeeperRegistration
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     * 
     * @param  ShopkeeperRegistered  $event
     * 
     * @return void
     *
     * Get User ID from Event ID & Match to Current Logged in User
     * If logged in User Has Role of 'Shopkeeper', create a business
     */
    public function handle(ShopkeeperRegistered $event)
    {
        $user = Auth::user($event->userID);
        if($user->hasRole('shopkeeper'))
        {
            $user->business()->save(new Businesses);
        }
    }
}
