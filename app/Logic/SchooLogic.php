<?php

namespace App\Logic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{School};
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;



class SchooLogic
{

    #quedé en el create de school

    protected $arrayValidate = [

            'id_country'      =>'required',
            'neighborhood'    => 'required',
            'address'         => 'required',
            'web'             => 'required|unique:schools',
            'email'           => 'required|unique:schools|email',
            'logo'            => 'required',
            'year'            =>'required'


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


            $school = School::create($request->all());
            return response()->json(ResponseApi::json([$school], 'Creación exitosa'), 201);



        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al crear, # $e ", $e->getCode()]), 400);
        }



    }

    public function view($request)
    {

        $validate = Validator::make($request->all(),[
            'id' => 'required'
        ]);
        if($validate->fails())
            return response()->json(ResponseApi::json(["id no enviado"], 'error', 'fallo', 202));


        try {
            $school = School::find($request->id);
            if($school)
                return response()->json(ResponseApi::json([$school], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["Registro no existe"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }
    }

    public function list($request)
    {
        try {

            $school = School::select('id', 'id_country','school_name','rector_name','neighborhood','address','web','email','logo','year')->get()->toArray();
                return response()->json(ResponseApi::json([$school], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }




    public function update(Request $request, $id){


        try {
            $school = School::find($id);
            if (!$school) {
                return response()->json(['message' => 'No se ha encontrado el registro'], 404);
            }

            // OLD
            $id_country_old = $school->id_country;
            $rector_name_old = $school->rector_name;
            $neighborhood_old = $school->neighborhood;
            $address_old = $school->address;
            $web_old = $school->web;
            $email_old = $school->email;
            $logo_old = $school->logo;
            $year_old = $school->year;

            // NEW
            $school->id_country = $request->input('id_country', $id_country_old);
            $school->rector_name = $request->input('rector_name', $rector_name_old);
            $school->neighborhood = $request->input('neighborhood', $neighborhood_old);
            $school->address = $request->input('address', $address_old);
            $school->web = $request->input('web', $web_old);
            $school->email = $request->input('email', $email_old);
            $school->logo = $request->input('logo', $logo_old);
            $school->year = $request->input('year', $year_old);

            $school->save();
            return response()->json(ResponseApi::json(["Registro actualizado correctamente"], 204));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al editar, # $e ", $e->getCode()]), 400);
        }
    }


    public function delete(Request $request)
    {

        $school = School::destroy($request->id);
            if ($school) {
                return response()->json(ResponseApi::json(["Registro eliminado correctamente"], 204));
        } else {
            return response()->json(['message' => 'No se ha encontrado el registro'], 404);
        }

    }


}




