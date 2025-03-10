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
        Schema::create('final_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_session_id')->default(1);
            $table->integer('price')->default(100)->nullable();
            $table->string('seats')->unique();
            $table->integer('row')->default(1);
            $table->string('dateTime')->nullable();

            $table->foreign('movie_session_id')->references('id')->on('movie_session')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_tickets');
    }
};
