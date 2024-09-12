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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('produto')->nullable(); // Permite valores nulos
            $table->integer('quantidade');
            $table->decimal('preco', 8, 2);
            $table->date('data_compra');
            $table->timestamps();
        });
    }
    
};
