<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * protected $fillable=['numcmd','client','datefab','produitfini_id','nbrcolis','pdstotal','nbrpal','observation','annulee'];
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->Increments('id');
            $table->smallInteger('numcmd',false,true);
            $table->string('client',25);
            $table->date('datefab')->useCurrent();
            $table->smallInteger('produitfini_id',false,true);
            $table->smallInteger('nbrcolis',false,true);
            $table->Decimal('pdstotal',8,3,true);
            $table->tinyInteger('nbrpal',false,true);
            $table->string('observation',25)->nullable();
            $table->boolean('annulee')->default(false);
            $table->timestamps();

            $table->foreign('produitfini_id')
                ->references('id')
                ->on('produitfinis')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
