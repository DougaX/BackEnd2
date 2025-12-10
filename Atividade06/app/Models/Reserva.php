<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sala_id',
        'data_inicio',
        'data_fim',
        'finalidade',
        'status',
        'observacoes'
    ];

    protected $casts = [
        'data_inicio' => 'datetime',
        'data_fim' => 'datetime',
    ];

    // Relacionamentos
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}