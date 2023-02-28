<?php

namespace App\Http\Controllers;
use App\Models\{TpJury};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;

class TpJuryController extends Controller
{
    protected $arrayValidate = [
        //validate input data.
            'id_table'   => 'required',
            'name_jury'   => 'required',
            'jury_duty' => 'required',
            // 'photo' => 'required',


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


            $tp_jury = TpJury::create($request->all());
            return response()->json(ResponseApi::json([$tp_jury], 'Creación exitosa'), 201);


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
            $tp_jury = TpJury::find($request->id);
            if($tp_jury)
                return response()->json(ResponseApi::json([$tp_jury], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["registro no encontrado"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list(Request $request)
    {
        try {

            $tp_jury = TpJury::select('id', 'id_table','name_jury','jury_duty','photo')->get()->toArray();
                return response()->json(ResponseApi::json([$tp_jury], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }

}
