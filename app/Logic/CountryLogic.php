<?php

namespace App\Logic;

use Illuminate\Http\Request;
use App\Models\{Country};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;



class CountryLogic
{

    protected $arrayValidate = [
        //validate input data.
            'country_code'   => 'required','unique',
            'country_name'   => 'required',
            'abbreviation'   => 'required',
            'currency'       => 'required',
            'image'          =>'required',

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


            $country = Country::create($request->except('updated_at'));
            return response()->json(ResponseApi::json([$country], 'Creación exitosa'), 201);


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al crear, # ", $e. $e->getCode()]), 400);
        }



    }

     public function view($request)
    {

        $validate = Validator::make($request->all(),[
            'id' => 'required'
        ]);
        if($validate->fails())
            return response()->json(ResponseApi::json(["id no existe"], 'error', 'fallo', 202));


        try {
            $country = Country::find($request->id);
            if($country)
                return response()->json(ResponseApi::json([$country], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["pais no existe"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list($request)
    {
        try {

            $country = Country::select('id', 'country_code','abbreviation')->get()->toArray();
                return response()->json(ResponseApi::json([$country], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }



    public function update(Request $request, $id)
    {
        try {
            $country = Country::find($id);

            // Actualizar los campos deseados utilizando los valores enviados en el $request
            $country->country_name = $request->input('country_nameme');


            // Guardar los cambios en la base de datos
            $country->save();

            return response()->json(ResponseApi::json([$country], 'Éxito al editar', 201));
        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al editar, # " . $e->getCode()]), 202);
        }
    }





}




