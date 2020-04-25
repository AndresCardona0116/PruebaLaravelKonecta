<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //Modelo de los roles
    //
    protected $table = 'roles';

    protected $fillable = ['Nombre', 'Descripcion', 'Estado'];

    public $timestamp=false;

    public function users(){
    	return $this->hasMany('App\User');
    }
}
