<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of Ventas
 *
 * @author daniel
 */
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Ventas extends Eloquent {

    protected $table = "Ventas";
    public $timestamps = false;
    protected $primaryKey = "_id";
    protected $fillable = [
        "IdCliente",
        "IdCatalogo",
        "Pagina",
        "IdMarca",
        "ID",
        "Numero",
        "Costo",
        "Precio",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
