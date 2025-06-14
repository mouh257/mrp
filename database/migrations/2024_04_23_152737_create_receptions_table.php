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
        Schema::create('receptions', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('ferme_id')->unsigned();
            $table->smallInteger('culture_id')->unsigned();
            $table->smallInteger('variete_id')->unsigned();
            $table->smallInteger('versement',false,true);
            $table->Integer('nbl',false,true);
            $table->Integer('nbr',false,true);
            $table->smallInteger('nbrcaisse',false,true);
            $table->Decimal('pdsbrut',8,3,true);
            $table->Decimal('pdsnet',8,3,true);
            $table->timestamps();

            $table->foreign('ferme_id')
                ->references('id')
                ->on('fermes')
                ->onDelete('cascade');

            $table->foreign('culture_id')
                ->references('id')
                ->on('cultures')
                ->onDelete('cascade');

            $table->foreign('variete_id')
                ->references('id')
                ->on('varietes')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receptions');
    }
};
