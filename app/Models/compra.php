<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class compra extends Model
{
    use HasFactory;

    public function up()
{
    Schema::create('compras', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relaciona a compra com um usuário
        $table->string('produto');
        $table->decimal('valor', 10, 2);
        $table->integer('quantidade');
        $table->timestamp('data_compra');
        $table->timestamps();
    });
}


protected $fillable = [
    'user_id', 'produto', 'valor', 'quantidade', 'data_compra',
];

public function user()
{
    return $this->belongsTo(User::class);
}

}
