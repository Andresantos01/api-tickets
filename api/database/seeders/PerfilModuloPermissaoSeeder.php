<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class PerfilModuloPermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perfil_id = DB::table('perfis_de_acesso')->where('nome', 'Administrador')->first()->id;
        $modulo_tickets_id = DB::table('modulos')->where('nome', 'tickets')->first()->id;
        
        $permissoes = ['criar', 'listar', 'editar', 'deletar'];
        
        foreach ($permissoes as $permissao_nome) {
            $permissao_id = DB::table('permissoes')->where('nome', $permissao_nome)->first()->id;

            DB::table('perfil_modulo_permissoes')->insert([
                'perfil_id' => $perfil_id,
                'modulo_id' => $modulo_tickets_id,
                'permissao_id' => $permissao_id
            ]);
        }
    }
}
