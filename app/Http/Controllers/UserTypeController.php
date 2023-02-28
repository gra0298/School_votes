<?php

namespace App\Http\Controllers;
use App\Models\{Modelo};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;
class ModeloController extends Controller
{
    protected $arrayValidate = [
        //validate input data.
            'id_candidate'   => 'required','unique',
            'id_matric'   => 'required',


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


            $variable = Modelo::create($request->except('updated_at'));
            return response()->json(ResponseApi::json([$variable], 'Creación exitosa'), 201);


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
            $variable = Modelo::find($request->id);
            if($variable)
                return response()->json(ResponseApi::json([$variable], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["registro no encontrado"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list(Request $request)
    {
        try {

            $variable = Modelo::select('id', 'xxxxx')->get()->toArray();
                return response()->json(ResponseApi::json([$variable], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }


}
