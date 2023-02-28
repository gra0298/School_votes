<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpCandidateGrade extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_candidate',
        'id_grade',
        'group_name',



    ];
    public $timestamps = false;
}
