<?php

namespace App\Http\Controllers\api\v1;

use App\Cambios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CambiosController extends Controller {

    protected $validateNew = array(
        'Cliente' => 'string',
        'IdCliente' => 'integer',
        'Catalogo' => 'string',
        'Pagina' => 'integer',
        'Marca' => 'string',
        'ID' => 'integer',
        'Numero' => 'float',
        'Costo' => 'float',
        'Precio' => 'float',
        'IDREGVenta' => 'integer'
    );
    protected $validateUpdate = array(
        "IDREG" => "integer|required|min:0",
        'Cliente' => 'string',
        'IdCliente' => 'integer',
        'Catalogo' => 'string',
        'Pagina' => 'integer',
        'Marca' => 'string',
        'ID' => 'integer',
        'Numero' => 'float',
        'Costo' => 'float',
        'Precio' => 'float',
        'IDREGVenta' => 'integer'
    );
    protected $validateDelete = array(
        "IDREG" => "integer|required|min:1",
    );

    public function index() {
        return Cambios::all();
    }

    public function create(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateNew)))
                return $validate;

            return Cambios::create($request->all());
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function actualizar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateUpdate)))
                return $validate;

            $cambios = Cambios::find($request->get("IDREG"));

            if (!count($cambios) > 0)
                return response()->json(["status" => false, "message" => "No se encontró el cambio a actualizar"]);

            $cambios->update($request->all());

            return response()->json(["status" => true, "message" => "Cambio actualizado"]);
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function eliminar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateDelete)))
                return $validate;

            $cambio = Cambios::find($request->get("IDREG"));

            if (!count($cambio) > 0)
                return response()->json(["status" => false, "message" => "No se encontró el cambio a eliminar"]);

            $cambio->delete();

            return response()->json(["status" => true, "message" => "Cambio eliminado con éxito"]);
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
