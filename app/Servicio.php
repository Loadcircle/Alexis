<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable =[
        'titulo', 'subtitulo','slug','precio',
        'contenido', 'fecha_inicio',
        'fecha_fin', 'condiciones', 'file',
        'tipo_servicio_id', 'status'
    ];
}
