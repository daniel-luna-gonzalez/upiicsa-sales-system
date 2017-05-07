<?php

namespace App\Http\Controllers\api\v1;

use App\Pagos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagosController extends Controller {

    protected $validateNew = array(
        'Cliente' => 'string',
        'IdCliente' => 'integer',
        'Fecha' => 'date',
        'Monto' => 'float',
        'Dia' => 'integer',
        'Mes' => 'integer',
        'Anio' => 'integer'
    );
    protected $validateUpdate = array(
        "IDREG" => "integer|required|min:0",
         'Cliente' => 'string',
        'IdCliente' => 'integer',
        'Fecha' => 'date',
        'Monto' => 'float',
        'Dia' => 'integer',
        'Mes' => 'integer',
        'Anio' => 'integer'
    );
    protected $validateDelete = array(
        "IDREG" => "integer|required|min:1",
    );

    public function index() {
        return Pagos::all();
    }

    public function create(Request $request) {
        try {
            if (!($validate = $this->validateRequest($request, $this->validateDelete)))
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

            $pago = PAgos::find($request->get("IDREG"));

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

            $pago = Pagos::find($request->get("IDREG"));

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
