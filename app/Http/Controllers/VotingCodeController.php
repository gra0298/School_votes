<?php

namespace App\Http\Controllers;
use App\Models\{VotingCode};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;

class VotingCodeController extends Controller
{
    protected $arrayValidate = [

        'id_student' => 'required',
        'code'=> 'required',



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

            $voting_site = VotingCode::create($request->all());
            return response()->json(ResponseApi::json([$voting_site], 'Creación exitosa'), 201);



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
            $voting_site = VotingCode::find($request->id);
            if($voting_site)
                return response()->json(ResponseApi::json([$voting_site], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["registro no existe"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list(Request $request)
    {
        try {

            $voting_site = VotingCode::select('id','id_student','code')->get()->toArray();
                return response()->json(ResponseApi::json([$voting_site], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
}
