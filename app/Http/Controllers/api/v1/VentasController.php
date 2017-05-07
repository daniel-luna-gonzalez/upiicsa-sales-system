<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1;

/**
 * Description of Ventas
 *
 * @author daniel
 */
use App\Cliente;
use App\Ventas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VentasController extends Controller {

    protected $validateNew = array(
        'Cliente' => 'string',
        'idCliente' => 'integer|required|min:1',
        'idCatalogo' => 'integer|required|min:1',
        'Catalogo' => 'string',
        'Pagina' => 'integer',
        'Marca' => 'string',
        'ID' => 'integer|required',
        'Numero' => 'float',
        'Costo' => 'integer',
        'Precio' => 'float',
        'Entregado' => 'integer',
        'Ubicacion' => 'string'
    );
    
    protected $validateUpdate = array(
        "IDREG"    => "integer|required|min:0",
        'idCliente' => 'integer|required|min:1',
        'idCatalogo' => 'integer|required|min:1',
        'Catalogo' => 'string',
        'Pagina' => 'integer',
        'Marca' => 'string',
        'Numero' => 'float',
        'Costo' => 'integer',
        'Precio' => 'float',
        'Entregado' => 'integer',
        'Ubicacion' => 'string'
    );
    
    protected $validateDelete = array(
        "IDREG" => "integer|required|min:1",
    );
    
    

    public function index() {
        return Ventas::all();
    }

    public function create(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateNew)))
                return $validate;

            return Ventas::create($request->all());
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }
    
    function actualizar(Request $request){
        try {
            if (!($validate = $this->validateRequest($request, $this->validateUpdate)))
                return $validate;

            $venta = Ventas::find($request->get("IDREG"));
            
            if(!count($venta) > 0)
                return response ()->json (["status" => false, "message" => "No se encontró la venta a actualizar"]);
            
            $venta->update($request->all());
            
            return response()->json(["status" => true, "message" => "Venta actualizada"]);
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function eliminar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateDelete)))
                return $validate;

            $venta = Ventas::find($request->get("IDREG"));
            
            if(!count($venta) > 0)
                return response ()->json (["status" => false, "message" => "No se encontró la venta a eliminar"]);
            
            $venta->delete();
            
            return response()->json(["status" => true, "message" => "Venta eliminada con éxito"]);
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

