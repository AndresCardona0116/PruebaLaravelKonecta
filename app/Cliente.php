<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = ['Nombre', 'Tipo_Documento', 'Num_Documenro', 'Direccion', 'Telefono', 'Email', 'Estado'];
}
