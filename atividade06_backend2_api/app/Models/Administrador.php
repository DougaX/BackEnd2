<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrador extends Model
{
    use HasFactory;
    protected $table = 'administradores';
    
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'user_id'
    ];

    // Relacionamentos
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}