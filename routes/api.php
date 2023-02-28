<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{CountriesController,SchoolsController
    ,GradesController,StudentsController,Auth\AuthController
    ,TpCandidacyController,TpCandidateController,TpAuxCandidateVoteController
    ,TpAuxWhiteVoteController,TpCandidateGradeController,TpControlPanelController
    ,TpDegreesPerTableController,TpPollingStationController};

Route::prefix('v1')->group(function () {


         Route::post('register', [AuthController::class, 'register']);
         Route::post('login', [AuthController::class, 'login']);



        // Route::middleware('jwt.verify')->group(function(){


            #Country
            Route::post('country/new', [CountriesController::class, 'createCountry']);
            Route::get('country/view', [CountriesController::class, 'viewCountry']);
            Route::get('country/list', [CountriesController::class, 'listCountries']);
            Route::put('country/update/{id}', [CountriesController::class, 'updateCountry']);
            Route::delete('country/delete/{id}', [CountriesController::class, 'deleteCountry']);


            #School
            Route::post('school/new', [SchoolsController::class, 'createSchool']);
            Route::get('school/view', [SchoolsController::class, 'viewSchool']);
            Route::get('school/list', [SchoolsController::class, 'listSchool']);
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


            #tp_candidacies => TpCandidacy
            Route::post('candidacy/new', [TpCandidacyController::class, 'create']);
            Route::get('candidacy/view', [TpCandidacyController::class, 'view']);
            Route::get('candidacy/list', [TpCandidacyController::class, 'list']);

            #tp_candidates => TpCandidate
            Route::post('candidate/new', [TpCandidateController::class, 'create']);
            Route::get('candidate/view', [TpCandidateController::class, 'view']);
            Route::get('candidate/list', [TpCandidateController::class, 'list']);

            #tp_aux_candidate_votes => TpAuxCandidateVote
            Route::post('aux/candidate/new', [TpAuxCandidateVoteController::class, 'create']);
            Route::get('aux/candidate/view', [TpAuxCandidateVoteController::class, 'view']);
            Route::get('aux/candidate/list', [TpAuxCandidateVoteController::class, 'list']);

            #tp_aux_white_vote => TpAuxWhiteVoteController
            // Route::post('aux/white/vote/new', [TpAuxWhiteVoteController::class, 'create']);
            // Route::get('aux/white/vote/view', [TpAuxWhiteVoteController::class, 'view']);
            Route::get('aux/white/vote/list', [TpAuxWhiteVoteController::class, 'list']);

            #tp_candidate_grades => TpCandidateGrade
            Route::post('candidate/grade/new', [TpCandidateGradeController::class, 'create']);
            Route::get('candidate/grade/view', [TpCandidateGradeController::class, 'view']);
            Route::get('candidate/grade/list', [TpCandidateGradeController::class, 'list']);

            #tp_control_panel => tp_control_panel
            Route::post('control/panel/new', [TpControlPanelController::class, 'create']);
            Route::get('control/panel/view', [TpControlPanelController::class, 'view']);
            Route::get('control/panel/list', [TpControlPanelController::class, 'list']);

            #tp_degrees_per_table => TpDegreesPerTabl

            Route::post('degrees/new', [TpDegreesPerTableController::class, 'create']);
            Route::get('degrees/view', [TpDegreesPerTableController::class, 'view']);
            Route::get('degrees/list', [TpDegreesPerTableController::class, 'list']);

            // tp_polling_stations
            Route::post('tp/polling/new', [TpPollingStationController::class, 'create']);
            Route::get('tp/polling/view', [TpPollingStationController::class, 'view']);
            Route::get('tp/polling/list', [TpPollingStationController::class, 'list']);

            // tp_jury
            Route::post('tp/jury/new', [TpJuryController::class, 'create']);
            Route::get('tp/jury/view', [TpJuryController::class, 'view']);
            Route::get('tp/jury/list', [TpJuryController::class, 'list']);









            // });








});
