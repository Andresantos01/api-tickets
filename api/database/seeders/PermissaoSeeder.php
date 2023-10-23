<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissoes = ['criar', 'listar', 'editar', 'deletar'];

        foreach ($permissoes as $permissao) {
            DB::table('permissoes')->insert([
                'nome' => $permissao
            ]);
        }
    }
}
