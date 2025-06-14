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
        Schema::create('produitfinis', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',30);
            $table->smallInteger('culture_id')->unsigned();
            $table->smallInteger('colis_id')->unsigned();
            $table->unsignedDecimal('pdscolis',8,2);
            $table->smallInteger('brqtt_id')->unsigned()->nullable();
            $table->unsignedSmallInteger('nbrbrqtt')->default(0);
            $table->unsignedSmallInteger('pdsbrqtt')->default(0);
            $table->smallInteger('couv_id')->unsigned()->nullable();
            $table->smallInteger('stab_id')->unsigned()->nullable();
            $table->unsignedSmallInteger('divstab')->default(1);
            $table->smallInteger('etiq_id')->unsigned()->nullable();
            $table->unsignedSmallInteger('nbretiq')->default(0);
            $table->smallInteger('etiq2_id')->unsigned()->nullable();
            $table->unsignedSmallInteger('nbretiq2')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('culture_id')
                ->references('id')
                ->on('cultures')
                ->onDelete('restrict');

            $table->foreign('colis_id')
                ->references('id')
                ->on('articles')
                ->onDelete('restrict');

            $table->foreign('brqtt_id')
                ->references('id')
                ->on('articles')
                ->onDelete('restrict');

            $table->foreign('couv_id')
                ->references('id')
                ->on('articles')
                ->onDelete('restrict');

            $table->foreign('stab_id')
                ->references('id')
                ->on('articles')
                ->onDelete('restrict');

            $table->foreign('etiq_id')
                ->references('id')
                ->on('articles')
                ->onDelete('restrict');

            $table->foreign('etiq2_id')
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
        Schema::dropIfExists('produitfinis');
    }
};
