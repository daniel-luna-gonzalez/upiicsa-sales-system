<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Pagos extends Eloquent {

    protected $table = "Pagos";
    public $timestamps = false;
    protected $primaryKey = "_id";
    protected $fillable = [
        'idCliente',
        'marca',
        'fecha',
        'monto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
