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

        Schema::create('xml_det', function (Blueprint $table) {
            $table->id();
            $table->string('c_prod');
            $table->string('produto');
            $table->string('u_comp', 5);
            $table->smallInteger('q_comp');
            $table->bigInteger('column_6');
            $table->float('v_un_comp');
            $table->float('v_prod');
            $table->string('u_trib', 5);
            $table->smallInteger('q_trib');
            $table->float('v_un_trib');
            $table->float('v_ipi');
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
        Schema::dropIfExists('xml_det');
    }
};
