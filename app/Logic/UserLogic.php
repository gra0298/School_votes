<?php

namespace App\Logic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{User};
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;



class UserLogic
{


    protected $arrayValidate = [
        //validate input data.

            'owner'             => 'required',
            'userName'   => 'required',
            'userPassword' => 'required', 'unique:posts',
            'state'     =>'required',

    ];

    public function __construct()
    {
    }

    public function create(Request $request)
    {

        // Validation of the form with the values to register, a data is added to the validation to determine the relationship
        $validate = Validator::make($request->all(), $this->arrayValidate);

        // Message with the errors generated in the validation
        if ($validate->fails())
            return response()->json(ResponseApi::json($validate->errors()->toArray(), 'error', 'fallo'), 400);
        try {
            //Entity models are used to upload the record to the database

            $person =User::create($request->all());

            $dataUserPerson = $person;
            return response()->json(ResponseApi::json([$dataUserPerson], 'Creación exitosa'), 201);


            //Try and catch for handling exceptions that may occur
        } catch (\PDOException $e) {
            // return response()->json(ResponseApi::json(["Error al crear, # ", $e. $e->getCode()]), 400);
            return response()->json(ResponseApi::json(["Error al crear, # ", $e. $e->getCode()]), 400);
        }
    }


}
