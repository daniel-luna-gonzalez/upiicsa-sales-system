<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Cambios extends Eloquent {

    protected $table = "Cambios";
    public $timestamps = false;
    protected $primaryKey = "_id";
    protected $fillable = [
        'cliente',
        'idCliente',
        'catalogo',
        'pagina',
        'marca',
        'id',
        'numero',
        'costo',
        'precio',
        'idRegVenta'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
