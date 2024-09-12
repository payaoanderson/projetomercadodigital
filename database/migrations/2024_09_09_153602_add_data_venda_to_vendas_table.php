<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('vendas', function (Blueprint $table) {
            // Alterar a coluna 'produto' para armazenar o nome do produto
            $table->string('produto')->change();
        });
    }

    public function down()
    {
        Schema::table('vendas', function (Blueprint $table) {
            // Reverter a alteração, se necessário
            // $table->unsignedBigInteger('produto_id')->change();
        });
    }
};
