<?php

namespace App\Http\Controllers\api\v1;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientesController extends Controller {

    protected $validateNew = array(
        "Nombre" => "string|required",
        "ApellidoPaterno" => "string|required",
        "ApellidoMaterno" => "string|required",
        "Direccion" => "string",
        "Telefono" => "string",
        "IdCliente" => "integer"
    );

    public function index() {
        return Cliente::all();
    }

    public function create(Request $request) {
        try {
                     if (!($validate = $this->validateRequest($request, $this->validateNew)))
                return $validate;

            return Cliente::create($request->all());
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function validateRequest(Request $request, $arrayFields) {
        try {
            $this->validate($request, $arrayFields);
        } catch (HttpResponseException $e) {
            return response()->json(['status' => false, 'message' => 'invalid_parameters',], IlluminateResponse::HTTP_BAD_REQUEST);
        }
        return true;
    }

}
