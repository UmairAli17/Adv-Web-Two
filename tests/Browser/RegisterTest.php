<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * Register as Shop Owner
     *
     * @return void
     */
    public function testRegisterShopOwner()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register')
                    ->value('#name', str_random(10))
                    ->value('#email', str_random(10).'@gmail.com')
                    ->value('#password', 'password123')
                    ->value('#password-confirm', 'password123')
                    ->select('#role', '1')
                    ->press('Register')
                    ->assertPathIs('/home')
                    ->visit('/shop');
        });
    }
}
