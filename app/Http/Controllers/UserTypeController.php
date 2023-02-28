<?php

namespace App\Http\Controllers;
use App\Models\{UserType};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;
class UserTypeController extends Controller
{


    public function __construct()
    {
    }


    public function list(Request $request)
    {
        try {

            $user_type = UserType::select('id', 'user_type')->get()->toArray();
                return response()->json(ResponseApi::json([$user_type], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }



    }


}
