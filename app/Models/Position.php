<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $table='Position';
    protected $primarykey='id';
    protected $fillable = ['PositionName', 'PositionCatID'];
}
