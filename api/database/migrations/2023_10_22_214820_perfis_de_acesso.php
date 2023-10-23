<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perfis_de_acesso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfis_de_acesso');
    }
};
