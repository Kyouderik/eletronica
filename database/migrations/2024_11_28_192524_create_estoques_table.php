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
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Nome do produto
            $table->string('tipo'); // Tipo do produto (ex: 'TV', 'Celular', etc.)
            $table->text('descricao'); // Descrição do produto
            $table->integer('quantidade')->default(0); // Quantidade em estoque
            $table->decimal('preco', 8, 2); // Preço do produto
            $table->string('fornecedor'); // Nome do fornecedor
            $table->timestamps();
        });
    }
    
};
