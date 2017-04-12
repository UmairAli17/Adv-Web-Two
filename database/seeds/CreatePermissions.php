<?php

use Illuminate\Database\Seeder;

class CreatePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'shopkeeper',
            'label' => 'Shopkeeper Action',
        ]);
    }
}
