<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $table = "Ventas";
    public $timestamps = false;
    protected $primaryKey = "IDREG";
    protected $fillable = [
        'Marca',
        'IdMarca'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
