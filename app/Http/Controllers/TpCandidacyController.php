<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;
use App\Models\{TpCandidacy};

class TpCandidacyController extends Controller
{
    protected $arrayValidate = [

        'id_inst' => 'required',
        'candidacy_name'=> 'required',

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

            $candidacy = TpCandidacy::create($request->all());
            return response()->json(ResponseApi::json([$candidacy], 'Creación exitosa'), 201);



        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al crear, # $e ", $e->getCode()]), 400);
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
            $candidacy = TpCandidacy::find($request->id);
            if($candidacy)
                return response()->json(ResponseApi::json([$candidacy], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["registro no existe"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list(Request $request)
    {
        try {

            $candidacy = TpCandidacy::select('id', 'id_inst','candidacy_name')->get()->toArray();
                return response()->json(ResponseApi::json([$candidacy], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }


}
