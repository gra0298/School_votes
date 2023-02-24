<?php

namespace App\Http\Controllers;
use App\Logic\UserLogic;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $user = new UserLogic;
        return $user->create($request);

    }

}
