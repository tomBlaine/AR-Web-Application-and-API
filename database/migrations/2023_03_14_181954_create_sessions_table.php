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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("code");
            $table->bigInteger('currentSlide');
            $table->bigInteger('sessionType');
            $table->bigInteger('pres_id')->references('id')->on('Presentation')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('user_id')->references('id')->on('User')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
