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
        Schema::create('departs', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('tracteur',50)->nullable();
            $table->string('remorque',50);
            $table->Integer('numexp',false,true)->unique();
            $table->date('datedepart')->useCurrent();
            $table->boolean('locked')->default(false);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departs');
    }
};
