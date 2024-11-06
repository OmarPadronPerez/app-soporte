<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $fillable = [
        'id', 
        'user', 
        'falla',
        'detalles',
        'estado',
        'usuario_resuelto',
        'urgencia',
        'foto',
        'fecha_creacion',
        'fecha_resuelto',
        'created_at',
        'updated_at'
    ];
}
