<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Marcas extends Eloquent
{
    protected $table = "Marcas";
    public $timestamps = false;
    protected $primaryKey = "_id";
    protected $fillable = [
        'marca'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
