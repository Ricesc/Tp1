<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';

    protected $fillable = [
        'numero',
        'anho',
        'descripcion',
        'estado',
        'hospital',
        'doctor',
        'id_pacientes'
    ];
}
