<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Diretor',
            'identify' => 'diretores',
            'description' => 'Executa a função de diretor',
        ]);

        Role::create([
            'name' => 'Supervisor',
            'identify' => 'supervisores',
            'description' => 'Executa a função de supervisor',
        ]);

        Role::create([
            'name' => 'Funcionário',
            'identify' => 'funcionarios',
            'description' => 'Executa a função de funcionário',
        ]);


    }
}
