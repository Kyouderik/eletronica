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
        Schema::create('ordens_servico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tecnico_id')->constrained()->onDelete('cascade'); // chave estrangeira para técnicos
            $table->string('nome_cliente');
            $table->string('telefone_cliente');
            $table->text('observacoes')->nullable();
            $table->string('tipo_aparelho');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordens_servico');
    }

};
