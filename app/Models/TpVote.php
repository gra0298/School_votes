<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_inst',
        'id_matric',
        'id_table',
        'timestamp',

    ];
    public $timestamps = false;

}
