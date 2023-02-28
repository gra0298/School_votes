<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpDegreesPerTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_table',
        'id_grade',
        'group_name',


    ];
    public $timestamps = false;
    protected $table = 'tp_degrees_per_table';
}
