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
        Schema::create('contrato', function (Blueprint $table) {
            $table->id();
            $table->string('numero'); // do contrato
            $table->string('processo'); // numero
            $table->date('data'); //data da homologacao
            $table->date('fim'); //termino de contrato
            $table->string('tipo')->nullable(); // campo vazio
            $table->string('secretaria'); // nome
            $table->date('publicado'); // data da publicadao
            $table->string('empresa'); // nome da empresa
            $table->string('objeto'); //objeto de contrato
            $table->string('classe'); // tipos de contrato
            $table->enum ('status', ['DIGITADO', 'ASSINADO', 'PAGO','DEVOLVIDO', 'ARQUIVADO', 'CANCELADO']); 
            $table->string('motivo')->nullable(); //motivo do status
            // $table->dateTime('deleted_at');
            $table->BigInteger('user_id');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrato');
    }
};
