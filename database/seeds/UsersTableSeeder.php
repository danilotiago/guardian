<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Fulano de tal',
            'email' => 'diretor@diretor.com',
            'password' => bcrypt('123456'),
        ]);
        Role::find(1)->users()->attach($user);


        $user = User::create([
            'name' => 'Ciclano de tal',
            'email' => 'supervisor@supervisor.com',
            'password' => bcrypt('123456'),
        ]);
        Role::find(2)->users()->attach($user);

        $user = User::create([
            'name' => 'Beltrano de tal',
            'email' => 'funcionario@funcionario.com',
            'password' => bcrypt('123456'),
        ]);
        Role::find(3)->users()->attach($user);

    }
}
