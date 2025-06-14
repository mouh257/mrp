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
        Schema::create('retours', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('reception_id')->unsigned();
            $table->string('raison');
            $table->timestamps();

            $table->foreign('reception_id')
                ->references('id')
                ->on('receptions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retours');
    }
};
