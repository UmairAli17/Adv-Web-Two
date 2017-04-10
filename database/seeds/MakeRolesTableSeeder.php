<?php

use Illuminate\Database\Seeder;

class MakeRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'shopkeeper',
            'description' => 'Shopkeeper Role',
        ]);

        DB::table('roles')->insert([
            'name' => 'user',
            'description' => 'Normal User Role',
        ]);
    }
}
