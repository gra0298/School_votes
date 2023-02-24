<?php

namespace App\Logic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{Person};
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;



class PeopleLogic
{

    /**
     * $arrayValidate
     *arrangement that encapsulates the validation
     * @var array
     */
    protected $arrayValidate = [
        //validate input data.
            'first_name'            => 'required',
            'last_name'             => 'required',
            'identification_type'   => 'required',
            'identification_number' => 'required', 'unique:posts',
            'residence_address'     =>'required',
            'role'                  => 'required',
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

            $person = Person::create($request->all());
            // $user = User::create([
            //     'person_id' => $person->id,
            //     'role_user' => $request->role_user,
            //     'password' => Hash::make($request->password)
            // ]);

            // Conditional to separate the methods according to the user role and the form of insertion,
            // it is established if it is necessary or not to indicate the relationship


            $dataUserPerson = $person;
            return response()->json(ResponseApi::json([$dataUserPerson], 'Creación exitosa'), 201);


            //Try and catch for handling exceptions that may occur
        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al crear, # ", $e. $e->getCode()]), 400);
        }
    }


}
