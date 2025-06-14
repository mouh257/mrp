<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('calibres', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',10);
            $table->smallInteger('culture_id')->unsigned();
            $table->timestamps();

            $table->foreign('culture_id')
                ->references('id')
                ->on('cultures')
                ->onDelete('cascade');
        });

    }


    public function down(): void
    {
        Schema::dropIfExists('calibres');
    }
};
