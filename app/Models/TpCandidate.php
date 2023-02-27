<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpCandidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_inst',
        'id_matric',
        'id_candidacy',
        'number',
        'state',
        'type'



    ];
    public $timestamps = false;
}
