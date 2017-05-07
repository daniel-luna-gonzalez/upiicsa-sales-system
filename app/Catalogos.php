<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogos extends Model {

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
