<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('sala_id')->constrained('salas')->onDelete('cascade');
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->string('finalidade');
            $table->enum('status', ['pendente', 'aprovada', 'rejeitada'])->default('pendente');
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};