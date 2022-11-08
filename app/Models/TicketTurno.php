<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketTurno extends Model
{
    use HasFactory;
    protected $table = "ticekts";
    protected $primaryKey = "id";
    protected $guarded = [];
    // protected $fillable = [
    //     'folio',
    //     'nombreTramite',
    //     'nombre',
    //     'paterno',
    //     'materno',
    //     'nivelIngresar',
    //     'municipio',
    //     'asunto',
    //     'status',
    //     'curp'
    // ];
}
