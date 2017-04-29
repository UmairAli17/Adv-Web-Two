<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Auth;
use App\User;
use App\Products;
class AddProductTest extends DuskTestCase
{
    /**
     * A Dusk test Adding a Product
     *
     * @return void
     */
    public function testAddProduct()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
            ->visit('create-product')
            ->value('#name', str_random(10))
            ->type('#description', 'Product Added by Test')
            ->type('#price', '10')
            ->attach('image', 'F:\xampp\htdocs\Assign2\public\placeholder.png')
            ->press('Add')
            ->assertSee('Product Added by Test');
        });
    }
    
}
