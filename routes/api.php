<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{PeopleController,UserController,CountriesController};

Route::prefix('v1')->group(function () {



    // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        //     return $request->user();
        // });

        Route::post('ensayo', [PeopleController::class, 'createPerson']);
        Route::post('user', [UserController::class, 'createUser']);

        #Country
        Route::post('country', [CountriesController::class, 'createCountry']);
        Route::get('country/view', [CountriesController::class, 'viewCountry']);
        Route::get('country/list', [CountriesController::class, 'listCountries']);
        Route::put('country/update/{id}', [CountriesController::class, 'updateCountry']);
});
