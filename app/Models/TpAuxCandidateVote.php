<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpAuxCandidateVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_candidate',
        'id_matric',

    ];
    public $timestamps = false;
}
