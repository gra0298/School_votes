<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpControlPanel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_inst',
        'name_process',
        'voting_table',
        'discrimination_based',
        'certificate_header',
        'start_date',
        'closing_date',
        // 'state'




    ];
    public $timestamps = false;
    protected $table = 'tp_control_panel';
}
