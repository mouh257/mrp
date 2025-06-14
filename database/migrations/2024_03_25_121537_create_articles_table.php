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
        Schema::create('articles', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',30);
            $table->smallInteger('group_id')->unsigned();
            $table->Integer('stockmin')->unsigned();
            $table->smallInteger('nbrppal')->unsigned();
            $table->string('unite',6);
            $table->timestamps();

            $table->foreign('group_id')
                ->references('id')
                ->on('groupedarticles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
