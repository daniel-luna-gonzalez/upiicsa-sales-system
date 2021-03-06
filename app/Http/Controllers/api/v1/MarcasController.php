<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Marcas;
use App\Http\Controllers\Controller;
    
class MarcasController extends Controller {

    protected $validateNew = array(
        'marca' => 'string',
    );
    protected $validateUpdate = array(
        "_id" => "string|required|min:0",
         'marca' => 'string',
    );
    protected $validateDelete = array(
        "_id" => "string|required|min:1",
    );

    public function index() {
        return Marcas::all();
    }

    public function create(Request $request) {
        try { 
            if (!($validate = $this->validateRequest($request, $this->validateNew)))
                return $validate;

            return Marcas::create($request->all());
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function actualizar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateUpdate)))
                return $validate;

            $marca = Marcas::find($request->get("_id"));

            if (!count($marca) > 0)
                return response()->json(["status" => false, "message" => "No se encontró la marca a actualizar"]);

            $marca->update($request->all());

            return response()->json(["status" => true, "message" => "Marca actualizada"]);
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function eliminar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateDelete)))
                return $validate;

            $marca = Marcas::find($request->get("_id"));

            if (!count($marca) > 0)
                return response()->json(["status" => false, "message" => "No se encontró la marca a eliminar"]);

            $marca->delete();

            return response()->json(["status" => true, "message" => "Marca eliminada con éxito"]);
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
