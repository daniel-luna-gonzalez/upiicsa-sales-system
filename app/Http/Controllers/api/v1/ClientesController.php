<?php

namespace App\Http\Controllers\api\v1;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientesController extends Controller {

    protected $validateNew = array(
        "Nombre" => "string|required",
        "ApellidoPaterno" => "string|required",
        "ApellidoMaterno" => "string",
        "Direccion" => "string",
        "Telefono" => "string",
    );
    
    protected $validateUpdate = array(
        "id"    => "integer|required|min:0",
        "Nombre" => "string|",
        "ApellidoPaterno" => "string|",
        "ApellidoMaterno" => "string",
        "Direccion" => "string",
        "Telefono" => "string",
    );
    
    protected $validateDelete = array(
        "id" => "integer|required|min:1",
    );
    
    

    public function index() {
        return Cliente::all();
    }

    public function create(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateDelete)))
                return $validate;

            return Cliente::create($request->all());
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }
    
    function actualizar(Request $request){
        try {
            if (!($validate = $this->validateRequest($request, $this->validateUpdate)))
                return $validate;

            $cliente = Cliente::find($request->get("id"));
            if(!count($cliente) > 0)
                return response ()->json (["status" => false, "message" => "No se encontró el cliente a actualizar"]);
            return response()->json(["status" => true, "message" => "Cliente actualizado"]);
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function eliminar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateDelete)))
                return $validate;

            $cliente = Cliente::find($request->get("id"));
            if(!count($cliente) > 0)
                return response ()->json (["status" => false, "message" => "No se encontró el cliente a eliminar"]);
            
            return response()->json(["status" => true, "message" => "Cliente eliminado con éxito"]);
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
