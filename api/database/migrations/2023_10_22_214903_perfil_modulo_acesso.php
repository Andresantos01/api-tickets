<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perfil_modulo_permissoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('perfil_id');
            $table->unsignedInteger('modulo_id');
            $table->unsignedInteger('permissao_id');
            $table->timestamps();

            $table->unique(['perfil_id', 'modulo_id', 'permissao_id']);
            
            $table->foreign('perfil_id')->references('id')->on('perfis_de_acesso')->onDelete('cascade');
            $table->foreign('modulo_id')->references('id')->on('modulos')->onDelete('cascade');
            $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfil_modulo_permissoes');
    }
};
