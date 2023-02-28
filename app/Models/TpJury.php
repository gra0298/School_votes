<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpJury extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_table',
        'name_jury',
        'jury_duty',
        'photo',


    ];
    public $timestamps = false;
}
