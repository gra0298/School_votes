<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{PeopleController,UserController,CountriesController,SchoolsController
    ,GradesController,StudentsController};

Route::prefix('v1')->group(function () {



    // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        //     return $request->user();
        // });

        Route::post('ensayo', [PeopleController::class, 'createPerson']);
        Route::post('user', [UserController::class, 'createUser']);

        #Country
        Route::post('country/new', [CountriesController::class, 'createCountry']);
        Route::get('country/view', [CountriesController::class, 'viewCountry']);
        Route::get('country/list', [CountriesController::class, 'listCountries']);
        Route::put('country/update/{id}', [CountriesController::class, 'updateCountry']);
        Route::delete('country/delete/{id}', [CountriesController::class, 'deleteCountry']);


        #School
        Route::post('school/new', [SchoolsController::class, 'createSchool']);
        Route::get('school/view', [SchoolsController::class, 'viewSchool']);
        Route::put('school/update/{id}', [SchoolsController::class, 'updateSchool']);
        Route::delete('school/delete/{id}', [SchoolsController::class, 'deleteSchool']);

        #Grade
        Route::post('grade/new', [GradesController::class, 'createGrade']);

        #Student
        Route::post('student/new', [StudentsController::class, 'createStudent']);
        Route::get('student/view', [StudentsController::class, 'viewStudent']);
        Route::get('student/list', [StudentsController::class, 'listStudents']);
        Route::put('student/update/{id}', [StudentsController::class, 'updateStudent']);
        Route::delete('student/delete/{id}', [StudentsController::class, 'deleteStudent']);

});
