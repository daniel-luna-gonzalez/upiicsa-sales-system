<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cambios extends Model {

    protected $table = "Cambios";
    public $timestamps = false;
    protected $primaryKey = "IDREG";
    protected $fillable = [
        'Cliente',
        'IdCliente',
        'Catalogo',
        'Pagina',
        'Marca',
        'ID',
        'Numero',
        'Costo',
        'Precio',
        'IDREGVenta'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
