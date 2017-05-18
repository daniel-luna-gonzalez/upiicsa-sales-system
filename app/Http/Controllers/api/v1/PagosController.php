<?php

namespace App\Http\Controllers\api\v1;

use App\Pagos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagosController extends Controller {

    protected $validateNew = array(
        'cliente' => 'string',
        'idCliente' => 'string',
        'fecha' => 'date',
        'monto' => 'numeric'
    );
    protected $validateUpdate = array(
        "_id" => "string|required",
        'cliente' => 'string',
        'idCliente' => 'string',
        'fecha' => 'date',
        'monto' => 'numeric'
    );
    protected $validateDelete = array(
        "_id" => "string|required",
    );

    public function index() {
        return Pagos::all();
    }

    public function create(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateNew)))
                return $validate;

            return Pagos::create($request->all());
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function actualizar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateUpdate)))
                return $validate;

            $pago = Pagos::find($request->get("_id"));

            if (!count($pago) > 0)
                return response()->json(["status" => false, "message" => "No se encontró el pago a actualizar"]);

            $pago->update($request->all());

            return response()->json(["status" => true, "message" => "Pago actualizada"]);
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    function eliminar(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateDelete)))
                return $validate;

            $pago = Pagos::find($request->get("_id"));

            if (!count($pago) > 0)
                return response()->json(["status" => false, "message" => "No se encontró el pago a eliminar"]);

            $pago->delete();

            return response()->json(["status" => true, "message" => "Pago eliminado con éxito"]);
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
