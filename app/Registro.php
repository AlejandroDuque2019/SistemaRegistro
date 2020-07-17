<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registro';
    protected $fillable = [
        'id_user',
        'tipoRegistro',
        'fechaRegistro',
        'horaRegistro'
    ];
}
