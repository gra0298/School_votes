<?php

namespace App\Http\Controllers;
use App\Logic\CountryLogic;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function createCountry(Request $request)
    {
        $Country = new CountryLogic;
        return $Country->create($request);

    }

    public function viewCountry(Request $request)
    {
        $Country = new CountryLogic;
        return $Country->view($request);

    }

    public function listCountries(Request $request)
    {
        $Countries= new CountryLogic;
        return $Countries->list($request);

    }

    public function updateCountry(Request $request,$id)
    {
        $Country= new CountryLogic;
        return $Country->update($request,$id);

    }

    public function deleteCountry(Request $request)
    {
        $Countries= new CountryLogic;
        return $Countries->delete($request);

    }
}
