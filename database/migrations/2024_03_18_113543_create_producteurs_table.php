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
        Schema::create('producteurs', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',50)->unique();
            $table->tinyInteger('ref',)->length(4)->unsigned()->unique();
            $table->Integer('ggn')->length(13)->unsigned()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producteurs');
    }
};
