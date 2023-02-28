<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpWhiteVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_inst',
        'id_candidacy',
        'name',
        'photo',
        'mime',
        // 'state',
        // 'type',


    ];
    public $timestamps = false;
    protected $table = 'tp_white_vote';
}
