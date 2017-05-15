<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Catalogos extends Eloquent {

    protected $table = "Catalogos";
    public $timestamps = false;
    protected $primaryKey = "IDREG";
    protected $fillable = [
        'Catalogo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
