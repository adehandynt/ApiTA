<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $primarykey='id';
    protected $fillable = ['PositionName', 'Jobdesk', 'PositionCatID'];
}
