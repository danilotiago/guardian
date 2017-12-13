<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create([
            'name' => 'Cadastra gerentes',
            'identify' => 'cadastrar_gerentes',
            'description' => 'Permissão para cadastrar gerentes',
        ]);
        $permission->roles()->attach(1);

        $permission = Permission::create([
            'name' => 'Cadastra funcionários',
            'identify' => 'cadastrar_funcionarios',
            'description' => 'Permissão para cadastrar funcionários',
        ]);
        $permission->roles()->attach([1, 2]);

        $permission = Permission::create([
            'name' => 'Cadastra produtos',
            'identify' => 'cadastrar_produtos',
            'description' => 'Permissão para cadastrar produtos',
        ]);
        $permission->roles()->attach([1, 2, 3]);


    }
}
