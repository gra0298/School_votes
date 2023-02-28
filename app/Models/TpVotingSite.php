<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpVotingSite extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_inst',
        'name_site',
        'site_location',
        'site_location',
        'state',

    ];
    public $timestamps = false;
}
