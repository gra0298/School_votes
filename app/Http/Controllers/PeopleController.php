<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\PeopleLogic;

class PeopleController extends Controller
{

    public function createPerson(Request $request)
    {
        $persona = new PeopleLogic;
        return $persona->create($request);

    }
}
