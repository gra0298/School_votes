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

    public function viewSchool(Request $request)
    {
        $school = new SchooLogic;
        return $school->view($request);

    }

    public function updateSchool(Request $request,$id)
    {
        // return [$request->logo,1];
        $school= new SchooLogic;
        return $school->update($request,$id);

    }

    public function deleteSchool(Request $request)
    {
        $school = new SchooLogic;
        return $school->delete($request);

    }
}
