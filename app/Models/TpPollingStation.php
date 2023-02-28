<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpPollingStation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_inst',
        'name_table',
        'group_name',
        'number_table',
        'location_table',
        'start_date',
        'closing_date',
        'state',


    ];
    public $timestamps = false;
}
