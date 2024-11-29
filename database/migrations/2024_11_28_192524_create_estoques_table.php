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
            $table->string('nome'); 
            $table->string('tipo'); 
            $table->text('descricao'); 
            $table->integer('quantidade')->default(0); 
            $table->decimal('preco', 8, 2); 
            $table->string('fornecedor'); 
            $table->timestamps();
        });
    }
    
};
