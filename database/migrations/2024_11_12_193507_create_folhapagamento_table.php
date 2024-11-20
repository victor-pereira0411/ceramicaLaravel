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
        Schema::create('folhapagamento', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("salario");
            $table->integer("somaMilheiros");
            $table->unsignedBigInteger('funcionario_id'); // Relacionamento com id do funcionário
            $table->foreign('funcionario_id')->references('idFuncionario')->on('funcionarios')->onDelete('cascade');
            $table->integer('valorMilheiro'); // Supondo que este campo seja do tipo integer
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folhapagamento');
    }
};
