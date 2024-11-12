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

        Schema::create('xml_total', function (Blueprint $table) {
            $table->id();
            $table->float('v_prod');
            $table->float('v_ipi');
            $table->float('v_nf');
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
        Schema::dropIfExists('xml_total');
    }
};
