<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    // protected $guarded = [];

    protected $fillable = [
        'id_country',
        'school_name',
        'rector_name',
        'neighborhood',
        'address',
        'web',
        'email',
        'logo',
        'year'
    ];
    public $timestamps = false;
}
