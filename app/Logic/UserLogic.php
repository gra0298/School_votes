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


    ];

    public function __construct()
    {
    }

    public function list($request)
    {
        try {

            $users = User::select('id', 'userName')->get()->toArray();
                return response()->json(ResponseApi::json([$users], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }


}
