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
        Schema::create('factures', function (Blueprint $table) {
            $table->Increments('id');
            $table->date('date')->useCurrent();
            $table->string('reference',25);
            $table->smallInteger('fournisseur_id',false,true);
            $table->Decimal('montant',15,3,true);

            $table->timestamps();

            $table->foreign('fournisseur_id')
                ->references('id')
                ->on('fournisseurs')
                ->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
