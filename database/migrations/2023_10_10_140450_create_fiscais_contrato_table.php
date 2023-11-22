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
        Schema::create('fiscais_contrato', function (Blueprint $table) {
            $table->id();
            $table->Biginteger('contrato_id')->unsigned();
            // $table->foreignId('contrato_id')->constrained();
            $table->string('nome');
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        
            $table->foreign('contrato_id')->references('id')->on('contrato');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiscais_contrato');
    }
};
