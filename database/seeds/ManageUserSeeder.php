<?php

use Illuminate\Database\Seeder;

class ManageUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User();
        $user->name = "Менеджер";
        $user->email = 'admin@test.ru';
        $user->password = bcrypt('123123123');
        $user->save();
        $role = \App\Models\Role::find(2);
        $user->roles()->attach($role); // добавление роли клиента
    }
}
