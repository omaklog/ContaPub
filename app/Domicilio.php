<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    public function estado()
    {
        return $this->hasOne('App\Estado');
    }
    public function municipio()
    {
        return $this->hasOne('App\Municipio');
    }
    public function localidad()
    {
        return $this->hasOne('App\Localidad');
    }
    public function tipoVialidad()
    {
        return $this->hasOne('App\TipoVialidad');
    }
    public function tipoAsentamiento()
    {
        return $this->hasOne('App\TipoAsentamiento');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }

}
