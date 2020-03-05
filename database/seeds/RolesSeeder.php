<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["name"=>"read_admin_panel"])->save();
        Role::create(["name"=>"write_admin_panel"])->save();
    }
}
