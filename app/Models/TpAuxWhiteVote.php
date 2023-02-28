<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpAuxWhiteVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_white_vote',
        'id_matric',

    ];
    public $timestamps = false;
    protected $table = 'tp_aux_white_vote';

}
