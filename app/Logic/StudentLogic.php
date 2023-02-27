<?php

namespace App\Logic;

use Illuminate\Http\Request;
use App\Models\{Student};
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;



class StudentLogic
{

    protected $arrayValidate = [

        'id_inst' => 'required',
        'id_grade'=> 'required',
        'identity_document'=> 'required',
        'student_names'=> 'required',
        'student_lastnames'=> 'required',
        'photo'=> 'required',
        'group_name'=> 'required',
        'year'=> 'required',


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

            $student = Student::create($request->except('updated_at'));
            return response()->json(ResponseApi::json([$student], 'Creación exitosa'), 201);


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
            $student = Student::find($request->id);
            if($student)
                return response()->json(ResponseApi::json([$student], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["Estudiante no existe"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }




    }
    public function list($request)
    {
        try {

            $Student = Student::select('id', 'id_inst','student_names','id_grade','identity_document','year','admission_date')->get()->toArray();
                return response()->json(ResponseApi::json([$Student], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }

    public function delete(Request $request)
    {

        $Student = Student::destroy($request->id);
            if ($Student) {
                return response()->json(ResponseApi::json(["Registro eliminado correctamente"], 204));
        } else {
            return response()->json(['message' => 'No se ha encontrado el registro'], 404);
        }

    }

    public function update(Request $request,$id){

        $validate = Validator::make($request->all(), $this->arrayValidate);
        if ($validate->fails())
            return response()->json(ResponseApi::json($validate->errors()->toArray(), 'error', 'fallo'), 400);
            try {

                $students = Student::findOrFail($request->$id);

                $students->id_country=$request->id_country;
                $students->id_inst=$request->id_inst;
                $students->id_grade=$request->id_grade;
                $students->identity_document=$request->identity_document;
                $students->student_names=$request->student_names;
                $students->student_lastnames=$request->student_lastnames;
                $students->photo=$request->photo;
                $students->group_name=$request->group_name;
                $students->year=$request->year;
                $students->admission_date=$request->admission_date;
                $students->status=$request->status;

                $students->save();
                return response()->json(ResponseApi::json([$students], 'Edicion exitosa'), 201);


            } catch (\PDOException $e) {
                return response()->json(ResponseApi::json(["Error al crear, # ",$e. $e->getCode()]), 400);
            }


}


}







