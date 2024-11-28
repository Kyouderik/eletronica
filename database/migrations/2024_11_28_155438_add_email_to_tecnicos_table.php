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
        Schema::table('tecnicos', function (Blueprint $table) {
            $table->string('email')->unique();  // Adiciona a coluna 'email' com a restrição UNIQUE
        });
    }

    public function down()
    {
        Schema::table('tecnicos', function (Blueprint $table) {
            $table->dropColumn('email');  // Remove a coluna 'email'
        });
    }

};
