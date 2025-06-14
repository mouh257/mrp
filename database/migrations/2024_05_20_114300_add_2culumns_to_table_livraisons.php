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
        Schema::table('livraisons', function (Blueprint $table) {
            //

            $table->Integer('commande_id',false,true)->nullable();
            $table->Integer('facture_id',false,true)->nullable();

            $table->foreign('commande_id')
                ->references('id')
                ->on('approvisionnements')
                ->onDelete('restrict');

            $table->foreign('facture_id')
                ->references('id')
                ->on('factures')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('livraisons', function (Blueprint $table) {
            //
        });
    }
};
