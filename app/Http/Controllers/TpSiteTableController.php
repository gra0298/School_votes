<?php

namespace App\Http\Controllers;
use App\Models\{TpSiteTable};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;

class TpSiteTableController extends Controller
{
    protected $arrayValidate = [
        //validate input data.
            'id_table'   => 'required',
            'id_site'   => 'required',


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


            $site_table = TpSiteTable::create($request->all());
            return response()->json(ResponseApi::json([$site_table], 'Creación exitosa'), 201);


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
            $site_table = TpSiteTable::find($request->id);
            if($site_table)
                return response()->json(ResponseApi::json([$site_table], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["registro no encontrado"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list(Request $request)
    {
        try {

            $site_table = TpSiteTable::select('id', 'id_table','id_site')->get()->toArray();
                return response()->json(ResponseApi::json([$site_table], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
}
