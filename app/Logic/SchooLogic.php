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
            'web'             => 'required',
            // 'email'           => 'required'|'unique',
            'logo'            => 'required',
            // 'year'            =>'required'


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

    // $school = School::select('id', 'rector_name')->where('id', $request->id)->get();

//     public function update(Request $request, $id)
// {
//     $school = School::findOrFail($id);
//     // $school->update($request->all());

//     return response()->json(ResponseApi::json([$school], 'Actualización exitosa'), 201);


// }

##segundo

// public function update(Request $request, $id)
// {
//     $school = School::find($id);
//     $school->fill($request->all());
//     $school->save();
//     return response()->json(['message' => 'School updated successfully',$school]);
//     // return response()->json(['message' => 'School updated successfully']);
// }

#tercero

// public function update(Request $request, $id)
// {
//     $school = School::find($id);
//     $school->rector_name = $request->input('rector_name');
//     $school->save();

//     return response()->json([
//         'message' => 'School updated successfully',
//         'school' => $school
//     ]);
// }

public function update(Request $request,$id){
    $school = School::findOrFail($request->$id);

    $school->id_country=$request->id_country;
    $school->school_name=$request->school_name;
    $school->rector_name=$request->rector_name;
    $school->neighborhood=$request->neighborhood;
    $school->address=$request->address;
    $school->web=$request->web;
    $school->email=$request->email;
    $school->web=$request->web;
    $school->logo=$request->logo;
    $school->year=$request->year;

    $school->save();
    return $school;



}








}
