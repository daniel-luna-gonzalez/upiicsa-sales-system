<?php

namespace App\Http\Controllers\api\v1;

use App\Catalogos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\Client as Mongo;

class CatalogosController extends Controller {

    protected $validateNew = array(
        'catalogo' => 'string',
    );
    protected $validateUpdate = array(
        "_id" => "string|required",
        'catalogo' => 'string',
    );
    protected $validateDelete = array(
        "_id" => "string|required",
    );

    public function index() {
        try {
            return Catalogos::all();
            
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function create(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateNew)))
                return $validate;
                        
            return Catalogos::create($request->all());
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function actualizar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateUpdate)))
                return $validate;

            $catalogo = Catalogos::find($request->get("_id"));

            if (!count($catalogo) > 0)
                return response()->json(["status" => false, "message" => "No se encontró el catálogo a actualizar"]);

            $catalogo->update($request->all());

            return response()->json(["status" => true, "message" => "Catálogo actualizado"]);
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function eliminar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateDelete)))
                return $validate;

            $catalogo = Catalogos::find($request->get("_id"));

            if (!count($catalogo) > 0)
                return response()->json(["status" => false, "message" => "No se encontró el catálogo a eliminar"]);

            $catalogo->delete();

            return response()->json(["status" => true, "message" => "Catálogo eliminado con éxito"]);
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
