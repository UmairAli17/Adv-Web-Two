<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MakeRolesTableSeeder::class);
        $this->call(CreatePermissions::class);
        $this->call(AssignPermissionstToRoles::class);
    }
}
