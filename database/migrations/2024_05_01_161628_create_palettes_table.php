<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * ['numpal','seriepal','depart_id','typpal_id','numcmd','cornier','feuillard']
     */
    public function up(): void
    {
        Schema::create('palettes', function (Blueprint $table) {
            $table->Increments('id');
            $table->tinyInteger('numpal',false,true)->nullable();
            $table->smallInteger('numcmd',false,true)->nullable();
            $table->tinyInteger('cornier',false,true)->default(4);
            $table->smallInteger('feuillard',false,true)->default(30);
            $table->Integer('depart_id',false,true)->nullable();
            $table->smallInteger('typpal_id',false,true)->nullable();

            $table->timestamps();

            $table->foreign('typpal_id')
                ->references('id')
                ->on('articles')
                ->onDelete('restrict');

            $table->foreign('depart_id')
                ->references('id')
                ->on('departs')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palettes');
    }
};
