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
            return response()->json(ResponseApi::json(["id no ingresado"], 'error', 'fallo', 202));


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
        try {
            $student = Student::find($id);
            if (!$student) {
                return response()->json(['message' => 'No se ha encontrado el registro'], 404);
            }

            // OLD
            $id_inst_old =    $student->id_inst;
            $id_grade_old=    $student->id_grade;
            $identity_document_old =    $student->identity_document;
            $student_names_old = $student->student_names;
            $student_lastnames_old= $student->student_lastnames;
            $group_name_old= $student->group_name;
            $year_old= $student->year;
            $admission_date_old= $student->admission_date;


            // NEW
            $student->id_inst = $request->input('id_inst', $id_inst_old);
            $student->id_grade = $request->input('id_grade', $id_grade_old);
            $student->identity_document = $request->input('identity_document', $identity_document_old);
            $student->student_names = $request->input('student_names', $student_names_old);
            $student->student_lastnames = $request->input('student_lastnames', $student_lastnames_old);
            $student->group_name = $request->input('group_name', $group_name_old);
            $student->year = $request->input('year', $year_old);
            $student->admission_date = $request->input('admission_date', $admission_date_old);



            $student->save();
            return response()->json(ResponseApi::json(["Registro actualizado correctamente"], 204));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al editar, # $e ", $e->getCode()]), 400);
        }








}


}







