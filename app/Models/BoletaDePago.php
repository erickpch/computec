<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletaDePago extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'monto_inicial',
        'monto_final',
        'id_empleado'
    ];
}
