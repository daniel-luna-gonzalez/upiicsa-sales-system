<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model {

    protected $table = "Pagos";
    public $timestamps = false;
    protected $primaryKey = "IDREG";
    protected $fillable = [
        'Cliente',
        'IdCliente',
        'Fecha',
        'Monto',
        'Dia',
        'Mes',
        'Anio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
