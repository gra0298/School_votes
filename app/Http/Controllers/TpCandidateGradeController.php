<?php

namespace App\Http\Controllers;
use App\Models\{TpCandidateGrade};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;

class TpCandidateGradeController extends Controller
{
    protected $arrayValidate = [

        'group_name' => 'required',

    ];

    public function create(Request $request)
    {


        $validate = Validator::make($request->all(), $this->arrayValidate);
        if ($validate->fails())
            return response()->json(ResponseApi::json($validate->errors()->toArray(), 'error', 'fallo'), 400);
        try {

            $candidate_grade = TpCandidateGrade::create($request->all());
            return response()->json(ResponseApi::json([$candidate_grade], 'Creación exitosa'), 201);



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
            $candidate_grade = TpCandidateGrade::find($request->id);
            if($candidate_grade)
                return response()->json(ResponseApi::json([$candidate_grade], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["registro no existe"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list(Request $request)
    {
        try {

            $candidate_grade = TpCandidateGrade::select('id', 'id_candidate','id_grade','group_name')->get()->toArray();
                return response()->json(ResponseApi::json([$candidate_grade], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }

}
