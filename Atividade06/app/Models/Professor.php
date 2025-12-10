<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professor extends Model
{
    use HasFactory;
    protected $table = 'professores';
    
    protected $fillable = [
        'nome',
        'email',
        'departamento',
        'user_id'
    ];

    // Relacionamentos
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function salasResponsavel()
    {
        return $this->hasMany(Sala::class, 'responsavel_id');
    }
}