<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulos = ['home', 'dashboard', 'tickets', 'empresas', 'usuarios', 'perfis de acesso', 'organizacao', 'definicoes'];

        foreach ($modulos as $modulo) {
            DB::table('modulos')->insert([
                'nome' => $modulo
            ]);
        }
    }
}
