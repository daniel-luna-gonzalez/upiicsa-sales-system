<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Cliente extends Eloquent
{
    protected $table = "Clientes";
    
    public $timestamps = false;
    protected $primaryKey = "_id";


    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'direccion',
        'telefono'
        ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    
}
