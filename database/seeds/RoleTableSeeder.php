<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'client';
        $role->description = 'Клиент';
        $role->save();

        $role = new Role();
        $role->name = 'manager';
        $role->description = 'Менеджер';
        $role->save();
    }
}
