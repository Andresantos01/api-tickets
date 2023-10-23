<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class PerfilDeAcessoSeeder extends Seeder
{
   /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perfis = ['Administrador', 'Usuário', 'Visitante'];

        foreach ($perfis as $perfil) {
            DB::table('perfis_de_acesso')->insert([
                'nome' => $perfil
            ]);
        }
    }
}
