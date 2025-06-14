<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * ['palette_id','produitfini_id','nbrcolis','versement','calibre_id','variete_id','coloration_id','pdstotal','observation']
     */
    public function up(): void
    {
        Schema::create('colisages', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('palette_id',false,true)->nullable();
            $table->smallInteger('produitfini_id',false,true);
            $table->tinyInteger('nbrcolis',false,true);
            $table->smallInteger('versement',false,true);
            $table->smallInteger('calibre_id',false,true)->nullable();
            $table->smallInteger('coloration_id',false,true)->nullable();
            $table->smallInteger('variete_id',false,true)->nullable();
            $table->Decimal('pdstotal',8,3,true);
            $table->string('observation',25)->nullable();
            $table->timestamps();

            $table->foreign('palette_id')
                ->references('id')
                ->on('palettes')
                ->onDelete('restrict');

            $table->foreign('produitfini_id')
                ->references('id')
                ->on('produitfinis')
                ->onDelete('restrict');

            $table->foreign('calibre_id')
                ->references('id')
                ->on('calibres')
                ->onDelete('restrict');

            $table->foreign('coloration_id')
                ->references('id')
                ->on('colorations')
                ->onDelete('restrict');

            $table->foreign('variete_id')
                ->references('id')
                ->on('varietes')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colisages');
    }
};
