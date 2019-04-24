<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{


    public function domicilio()
    {
        return $this->hasOne('App\Domicilio');
    }


}
