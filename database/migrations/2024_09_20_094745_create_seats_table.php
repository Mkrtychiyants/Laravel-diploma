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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->integer('row')->default(1);
            $table->integer('price')->default(100);
            $table->boolean('is_vip')->default(false)->nullable();
            $table->boolean('is_blocked')->default(false)->nullable(); 

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
