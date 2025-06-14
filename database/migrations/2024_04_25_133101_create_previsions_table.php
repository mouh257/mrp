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
        Schema::create('previsions', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('ferme_id')->unsigned();
            $table->smallInteger('culture_id')->unsigned();
            $table->smallInteger('variete_id')->unsigned();
            $table->Decimal('pdsprevu',8,3,true);
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
        Schema::dropIfExists('previsions');
    }
};
