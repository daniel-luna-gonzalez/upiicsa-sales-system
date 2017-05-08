<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $table = "Marcas";
    public $timestamps = false;
    protected $primaryKey = "IDREG";
    protected $fillable = [
        'Marca'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
