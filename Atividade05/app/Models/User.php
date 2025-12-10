<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;  // ← VERIFICAR ESTA LINHA

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;  // ← VERIFICAR HasApiTokens

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',  // ← VERIFICAR
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Adicionar métodos auxiliares
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isProfessor(): bool
    {
        return $this->role === 'professor';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }
}