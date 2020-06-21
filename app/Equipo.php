<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = ['descripcion','user_id','tipoequipo_id','marca_id','modelo_id','serial',
                          'namefoto', 'sap','fe_adquisicion','debaja', 'nompc', 'ip'];



    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function modelo()
    {
       return $this->belongsTo('App\Modelo');
    }

    public function tipoequipo()
    {
       return $this->belongsTo('App\Tipoequipo');
    }

    public function marca()
    {
       return $this->belongsTo('App\Marca');
    }
    

}
