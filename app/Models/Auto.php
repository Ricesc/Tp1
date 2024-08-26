<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    protected $table = 'autos';

    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'color',
        'precio',
        'activo'
    ];
}
