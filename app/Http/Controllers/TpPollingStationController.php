<?php

namespace App\Http\Controllers;
use App\Models\{TpPollingStation};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;

class TpPollingStationController extends Controller
{
    protected $arrayValidate = [
        //validate input data.
            'id_inst'   => 'required',
            'name_table'   => 'required',
            'number_table'   => 'required',
            'location_table'   => 'required',
            'start_date'   => 'required',
            'closing_date'   => 'required',
            // 'state'   => 'required',


    ];

    public function __construct()
    {
    }

    public function create(Request $request)
    {



        $validate = Validator::make($request->all(), $this->arrayValidate);
        if ($validate->fails())
            return response()->json(ResponseApi::json($validate->errors()->toArray(), 'error', 'fallo'), 400);
        try {


            $polling_station = TpPollingStation::create($request->except('updated_at'));
            return response()->json(ResponseApi::json([$polling_station], 'Creación exitosa'), 201);


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al crear, # ", $e. $e->getCode()]), 400);
        }



    }

     public function view(Request $request)
    {

        $validate = Validator::make($request->all(),[
            'id' => 'required'
        ]);
        if($validate->fails())
            return response()->json(ResponseApi::json(["id no enviado"], 'error', 'fallo', 202));


        try {
            $polling_station = TpPollingStation::find($request->id);
            if($polling_station)
                return response()->json(ResponseApi::json([$polling_station], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["registro no encontrado"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list(Request $request)
    {
        try {

            $polling_station = TpPollingStation::select('id', 'id_inst','name_table','number_table','location_table','start_date','closing_date','state')->get()->toArray();
                return response()->json(ResponseApi::json([$polling_station], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
}
