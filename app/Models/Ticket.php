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
        'User', 
        'Falla',
        'Detalles',
        'Usuario_resuelto',
        'Diagnostico',
        'Urgencia',
        'Foto',
        'fecha_creacion',
        'fecha_resuelto',
        'created_at',
        'updated_at'
    ];
}
