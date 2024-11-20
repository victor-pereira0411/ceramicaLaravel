<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id('idFuncionario');
            $table->timestamps();
            $table->string('name');
            $table->integer('ganhoMilheiro');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};