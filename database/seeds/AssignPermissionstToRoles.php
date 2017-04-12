<?php

use Illuminate\Database\Seeder;

class AssignPermissionstToRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions_roles')->insert([
            'permissions_id' => '1',
            'roles_id' => '1',
        ]);
    }
}
