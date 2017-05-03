<?php

namespace App\Http\Controllers\api\v1;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientesController extends Controller {

    public function index() {
        return Cliente::all();
    }

}
