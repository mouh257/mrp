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
        Schema::create('fermes', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',10)->unique();
            $table->string('adresse',25)->nullable();
            $table->smallInteger('producteur_id')->unsigned();
            $table->timestamps();

            $table->foreign('producteur_id')
                ->references('id')
                ->on('producteurs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fermes');
    }
};
