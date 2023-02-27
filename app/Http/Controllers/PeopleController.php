<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\UserLogic;

class PeopleController extends Controller
{

    public function listPerson(Request $request)
    {
        $persona = new UserLogic;
        return $persona->list($request);

    }
}
