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

        Schema::create('xml_cobr', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('n_fat');
            $table->float('v_orig');
            $table->float('v_liq');
            $table->date('d_venc');
            $table->float('v_dup');
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
        Schema::dropIfExists('xml_cobr');
    }
};
