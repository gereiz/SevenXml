<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('xml_emit', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj', 18);
            $table->string('nome');
            $table->string('municipio');
            $table->string('uf', 2);
            $table->string('cep', 10);
            $table->string('c_pais', 4);
            $table->string('x_pais');
            $table->string('insc_est', 15);
            $table->unsignedBigInteger('id_nf');
            $table->foreign('id_nf')->references('id')->on('xml_ide');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xml_emit');
    }
};
