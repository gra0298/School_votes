<?php

namespace App\Http\Controllers;
use App\Logic\StudentLogic;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function createStudent(Request $request)
    {
        $student = new StudentLogic;
        return $student->create($request);

    }

    public function viewStudent(Request $request)
    {
        $student = new StudentLogic;
        return $student->view($request);

    }

    public function listStudents(Request $request)
    {
        $student = new StudentLogic;
        return $student->list($request);

    }

    public function updateStudent(Request $request,$id)
    {
        $student= new StudentLogic;
        return $student->update($request,$id);

    }

    public function deleteStudent(Request $request)
    {
        $student= new StudentLogic;
        return $student->delete($request);

    }
}
