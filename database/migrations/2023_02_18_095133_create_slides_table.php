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
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("text1");
            $table->string("text2")->nullable();
            $table->string("text3")->nullable();
            $table->string("obj")->nullable();
            $table->string("objScale")->nullable();
            $table->bigInteger('user_id')->references('id')->on('User')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('pres_id')->references('id')->on('Presentation')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
