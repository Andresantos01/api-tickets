<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class); //create user
        $this->call(ModuloSeeder::class);
        $this->call(PermissaoSeeder::class);
        $this->call(PerfilDeAcessoSeeder::class);
        $this->call(PerfilModuloPermissaoSeeder::class);
    }
}
