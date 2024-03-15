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
        Schema::create('responsavel_secretaria', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
            $table->BigInteger('responsavel_id')->unsigned();
            $table->foreign('responsavel_id')->references('id')->on('responsavel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsavel_secretaria');
    }
};
