<?php

namespace App\Http\Controllers\api\v1;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientesController extends Controller {

    protected $validateNew = array(
        "nombre" => "string|required",
        "apellidoPaterno" => "string|required",
        "apellidoMaterno" => "string",
        "direccion" => "string",
        "telefono" => "string",
    );
    
    protected $validateUpdate = array(
        "_id"    => "string|required",
        "nombre" => "string|",
        "apellidoPaterno" => "string|",
        "apellidoMaterno" => "string",
        "direccion" => "string",
        "telefono" => "string",
    );
    
    protected $validateDelete = array(
        "_id" => "string|required",
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
    
    function actualizar(Request $request){
        try {
            if (!($validate = $this->validateRequest($request, $this->validateUpdate)))
                return $validate;
            
            $cliente = Cliente::find($request->get("_id"));
                 
            if(!count($cliente) > 0)
                return response ()->json (["status" => false, "message" => "No se encontró el cliente a actualizar"]);
            
            $cliente->update($request->all());
                        
            return response()->json(["status" => true, "message" => "Cliente actualizado"]);
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function eliminar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateDelete)))
                return $validate;

            $cliente = Cliente::find($request->get("_id"));
            if(!count($cliente) > 0)
                return response ()->json (["status" => false, "message" => "No se encontró el cliente a eliminar"]);
            
            $cliente->delete();
            
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
