<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_inst',
        'id_grade',
        'identity_document',
        'student_names',
        'student_lastnames',
        'photo',
        'group_name',
        'year'


    ];
    public $timestamps = false;
}
