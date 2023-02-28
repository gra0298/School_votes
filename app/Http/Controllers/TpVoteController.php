<?php

namespace App\Http\Controllers;
use App\Models\{TpVote};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;

class TpVoteController extends Controller
{
    protected $arrayValidate = [
        //validate input data.
            'id_inst'   => 'required','unique',
            'id_matric'   => 'required',
            'id_table'   => 'required',
            'timestamp'   => 'required',


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


            $tp_vote = TpVote::create($request->all());
            return response()->json(ResponseApi::json([$tp_vote], 'Creación exitosa'), 201);


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
            $tp_vote = TpVote::find($request->id);
            if($tp_vote)
                return response()->json(ResponseApi::json([$tp_vote], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["registro no encontrado"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list(Request $request)
    {
        try {

            $tp_vote = TpVote::select('id', 'id_inst','id_matric','id_table','timestamp')->get()->toArray();
                return response()->json(ResponseApi::json([$tp_vote], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
}
