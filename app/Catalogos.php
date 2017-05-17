<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Catalogos extends Eloquent {

    protected $table = "Catalogos";
    public $timestamps = false;
    protected $primaryKey = "_id";
    protected $fillable = [
        'catalogo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
