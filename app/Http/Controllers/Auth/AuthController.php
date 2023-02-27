<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    protected $arrayValidate = [
        'userName'     =>  'required',
        'userPassword' =>  'required',
        'owner'        =>  'required',
        'id_type'     =>  'required',


    ];

    public function register(Request $request){

        $validate = Validator::make($request->all(), $this->arrayValidate);
        if ($validate->fails())
            return response()->json(ResponseApi::json($validate->errors()->toArray(), 'error', 'fallo'), 400);
        try {



            $user = User::create([
                'owner' => $request->owner,
                'id_type' => $request->id_type,
                'userName' => $request->userName,
                'userPassword' => Hash::make($request->userPassword)

            ]);

            $token =JWTAuth::fromUser($user);

            return response()->json(ResponseApi::json(['Usuario'=>$user,'token'=>$token], 'Creación exitosa'), 201);


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al registar, # ", $e. $e->getCode()]), 400);
        }


    }


    public function login(LoginRequest $request){

        $user = User::where('userName', $request->userName)->first();

        if (!$user || !Hash::check($request->userPassword, $user->userPassword)) {
            return response()->json([
                'error' => 'invalid credentials'
            ], 400);
        }

        try {
            $token = JWTAuth::fromUser($user);
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'could not create token'
            ], 500);
        }

        return response()->json(compact('token'));

    }




}
