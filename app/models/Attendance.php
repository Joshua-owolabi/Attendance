<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
        'user_id',
        'reg_no',
        'att_date',
        'att_points',
        'scanned'
    ];
}
