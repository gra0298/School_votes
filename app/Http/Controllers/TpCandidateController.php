<?php

namespace App\Http\Controllers;
use App\Models\{TpCandidate};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;

class TpCandidateController extends Controller
{
    protected $arrayValidate = [

        'id_inst' => 'required',
        'id_matric'=> 'required',
        'id_candidate'=> 'required',
        'number'=> 'required',
        'state'=> 'required',

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

            $candidate = Tpcandidate::create($request->all());
            return response()->json(ResponseApi::json([$candidate], 'Creación exitosa'), 201);



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
            $candidate = Tpcandidate::find($request->id);
            if($candidate)
                return response()->json(ResponseApi::json([$candidate], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["registro no existe"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list(Request $request)
    {
        try {

            $candidate = Tpcandidate::select('id', 'id_inst','id_matric','id_candidacy','number','state','type')->get()->toArray();
                return response()->json(ResponseApi::json([$candidate], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }

}
