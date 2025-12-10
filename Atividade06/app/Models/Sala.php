<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sala extends Model
{
    use HasFactory;
    protected $table = 'salas';
    
    protected $fillable = [
        'nome',
        'capacidade',
        'localizacao',
        'responsavel_id'
    ];

    // Relacionamentos
    public function responsavel()
    {
        return $this->belongsTo(Professor::class, 'responsavel_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}