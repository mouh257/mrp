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
        Schema::create('caisseries', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('ferme_id')->unsigned();
            $table->Integer('nbs',false,true);
            $table->smallInteger('nbrcaisse',false,true);
            $table->timestamps();

            $table->foreign('ferme_id')
                ->references('id')
                ->on('fermes')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caisseries');
    }
};
