<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpCandidacy extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_inst',
        'candidacy_name',
        'state',



    ];
    public $timestamps = false;
}
