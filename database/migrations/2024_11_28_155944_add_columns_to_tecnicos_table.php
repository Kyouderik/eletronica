<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTecnicosTable extends Migration
{
    public function up()
    {
        Schema::table('tecnicos', function (Blueprint $table) {
            $table->string('nome');
            $table->string('telefone');
            $table->string('especialidade');
        });
    }

    public function down()
    {
        Schema::table('tecnicos', function (Blueprint $table) {
            $table->dropColumn(['nome', 'telefone', 'especialidade']);
        });
    }
}
