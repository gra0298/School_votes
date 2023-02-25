<?php

namespace App\Logic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{Grade};
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;



class GradeLogic
{

    /**
     * $arrayValidate
     *arrangement that encapsulates the validation
     * @var array
     */
    protected $arrayValidate = [
        //validate input data.
            'grade_code'            => 'required',
            'grade_name'             => 'required',
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

            $grade = Grade::create($request->all());
            return response()->json(ResponseApi::json([$grade], 'Creación exitosa'), 201);



        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al crear, # $e ", $e->getCode()]), 400);
        }



    }


}
