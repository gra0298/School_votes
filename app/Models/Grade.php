<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'grade';
    // protected $guarded = [];
    protected $fillable = [
        'grade_code',
        'grade_name',


    ];
    public $timestamps = false;
}
