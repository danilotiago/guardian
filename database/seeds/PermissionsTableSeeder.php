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
            'name' => 'Visualizar gerentes',
            'identify' => 'visualizar_gerentes',
            'group' => 'gerentes',
            'description' => 'Permissão para visualizar gerentes',
        ]);
        $permission->roles()->attach(1);

        $permission = Permission::create([
            'name' => 'Cadastra gerentes',
            'identify' => 'cadastrar_gerentes',
            'group' => 'gerentes',
            'description' => 'Permissão para cadastrar gerentes',
        ]);
        $permission->roles()->attach(1);

        $permission = Permission::create([
            'name' => 'Alterar gerentes',
            'identify' => 'alterar_gerentes',
            'group' => 'gerentes',
            'description' => 'Permissão para alterar gerentes',
        ]);
        $permission->roles()->attach(1);

        $permission = Permission::create([
            'name' => 'Excluir gerentes',
            'identify' => 'excluir_gerentes',
            'group' => 'gerentes',
            'description' => 'Permissão para excluir gerentes',
        ]);
        $permission->roles()->attach(1);

        $permission = Permission::create([
            'name' => 'Visualizar funcionários',
            'identify' => 'visualizar_funcionarios',
            'group' => 'funcionarios',
            'description' => 'Permissão para visualizar funcionários',
        ]);
        $permission->roles()->attach([1, 2]);

        $permission = Permission::create([
            'name' => 'Cadastra funcionários',
            'identify' => 'cadastrar_funcionarios',
            'group' => 'funcionarios',
            'description' => 'Permissão para cadastrar funcionários',
        ]);
        $permission->roles()->attach([1, 2]);

        $permission = Permission::create([
            'name' => 'Altera funcionários',
            'identify' => 'alterar_funcionarios',
            'group' => 'funcionarios',
            'description' => 'Permissão para alterar funcionários',
        ]);
        $permission->roles()->attach([1, 2]);

        $permission = Permission::create([
            'name' => 'Excluir funcionários',
            'identify' => 'exluir_funcionarios',
            'group' => 'funcionarios',
            'description' => 'Permissão para exluir funcionários',
        ]);
        $permission->roles()->attach([1, 2]);

        $permission = Permission::create([
            'name' => 'Visualiza produtos',
            'identify' => 'visualizar_produtos',
            'group' => 'produtos',
            'description' => 'Permissão para visualizar produtos',
        ]);
        $permission->roles()->attach([1, 2, 3]);

        $permission = Permission::create([
            'name' => 'Cadastra produtos',
            'identify' => 'cadastrar_produtos',
            'group' => 'produtos',
            'description' => 'Permissão para cadastrar produtos',
        ]);
        $permission->roles()->attach([1, 2, 3]);

        $permission = Permission::create([
            'name' => 'Altera produtos',
            'identify' => 'alterara_produtos',
            'group' => 'produtos',
            'description' => 'Permissão para alterar produtos',
        ]);
        $permission->roles()->attach([1, 2, 3]);

        $permission = Permission::create([
            'name' => 'Excluir produtos',
            'identify' => 'excluir_produtos',
            'group' => 'produtos',
            'description' => 'Permissão para excluir produtos',
        ]);
        $permission->roles()->attach([1, 2, 3]);


    }
}
