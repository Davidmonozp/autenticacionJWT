<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $fillable = [
        'name', 'type', 'serial_number', 'description', 'details'
    ];

    protected $casts = [
        'details' => 'array', // Convierte el campo JSON a un array cuando se accede
    ];
}
