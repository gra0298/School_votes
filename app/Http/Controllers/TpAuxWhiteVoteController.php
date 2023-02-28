<?php

namespace App\Http\Controllers;
use App\Models\{TpAuxWhiteVote};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;

class TpAuxWhiteVoteController extends Controller
{
    protected $arrayValidate = [
        // //validate input data.
        //     'id_candidate'   => 'required','unique',
        //     'id_matric'   => 'required',


    ];

    public function __construct()
    {
    }




    public function list(Request $request)
    {
        try {

            $aux_white_vote = TpAuxWhiteVote::select('id', 'id_white_vote','id_matric')->get()->toArray();
                return response()->json(ResponseApi::json([$aux_white_vote], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
}
