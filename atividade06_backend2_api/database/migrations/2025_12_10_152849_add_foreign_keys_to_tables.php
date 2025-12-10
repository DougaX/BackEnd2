<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Adicionar user_id aos professores
        Schema::table('professores', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        });

        // Adicionar user_id aos administradores
        Schema::table('administradores', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        });

        // Adicionar responsável à sala
        Schema::table('salas', function (Blueprint $table) {
            $table->foreignId('responsavel_id')->nullable()->constrained('professores')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('salas', function (Blueprint $table) {
            $table->dropForeign(['responsavel_id']);
            $table->dropColumn('responsavel_id');
        });

        Schema::table('administradores', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('professores', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};