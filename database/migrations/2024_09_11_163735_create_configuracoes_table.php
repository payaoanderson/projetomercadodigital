<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracoesTable extends Migration
{
    public function up()
    {
        Schema::create('configuracao', function (Blueprint $table) {
            $table->id();
            $table->string('chave')->unique();
            $table->text('valor');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configuracoes');
    }
}