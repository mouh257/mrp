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
        Schema::create('sorties', function (Blueprint $table) {
            $table->Increments('id');
            $table->date('date')->useCurrent();
            $table->smallInteger('nbs',false,true);
            $table->smallInteger('fournisseur_id',false,true);
            $table->smallInteger('article_id',false,true);
            $table->integer('quantite',false,true);

            $table->timestamps();

            $table->foreign('fournisseur_id')
                ->references('id')
                ->on('fournisseurs')
                ->onDelete('restrict');

            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sorties');
    }
};
