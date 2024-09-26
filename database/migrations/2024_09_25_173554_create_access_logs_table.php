<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessLogsTable extends Migration
{
    public function up()
    {
        Schema::create('access_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address'); // Armazena o IP do usuário
            $table->timestamps(); // Data e hora do acesso
        });
    }

    public function down()
    {
        Schema::dropIfExists('access_logs');
    }
}