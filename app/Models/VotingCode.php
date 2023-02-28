<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_student',
        'code',


    ];
    protected $table = 'voting_code';
    public $timestamps = false;

}
