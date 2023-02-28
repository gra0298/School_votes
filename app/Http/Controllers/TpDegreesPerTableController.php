<?php

namespace App\Http\Controllers;
use App\Models\{TpDegreesPerTable};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;

class TpDegreesPerTableController extends Controller
{
    protected $arrayValidate = [

        // 'id_table' => 'required',
        'id_grade'  => 'required',
        'group_name' => 'required',


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


        $degrees_per_table = TpDegreesPerTable::create($request->all());
        return response()->json(ResponseApi::json([$degrees_per_table], 'Creación exitosa'), 201);



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
        $degrees_per_table = TpDegreesPerTable::find($request->id);
        if($degrees_per_table)
            return response()->json(ResponseApi::json([$degrees_per_table], 'Éxito al mostrar', 201));
        return response()->json(ResponseApi::json(["Registro no existe"], 'error', 'fallo', 202));


    } catch (\PDOException $e) {
        return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
    }
}

public function list(Request $request)
{
    try {

        $degrees_per_table = TpDegreesPerTable::select('id', 'id_table','id_grade','group_name')->get()->toArray();
            return response()->json(ResponseApi::json([$degrees_per_table], 'Éxito al mostrar', 201));

    } catch (\PDOException $e) {
        return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
    }


}







}
