<?php

namespace App\Http\Controllers;
use App\Logic\GradeLogic;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function createGrade(Request $request)
    {
        $grade = new GradeLogic;
        return $grade->create($request);

    }
}
