<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpSiteTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_candidate',
        'id_table',
        'id_site',

    ];
    public $timestamps = false;
    protected $table = 'tp_site_table';
}
