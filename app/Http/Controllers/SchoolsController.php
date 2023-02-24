<?php

namespace App\Http\Controllers;
use App\Logic\SchooLogic;

use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function createSchool(Request $request)
    {
        $school = new SchooLogic;
        return $school->create($request);

    }

    public function updateSchool(Request $request,$id)
    {
        $school= new SchooLogic;
        return $school->update($request,$id);

    }
}
