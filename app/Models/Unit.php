<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $table = 'Unit';
    protected $primarykey='id';
    protected $fillable = ['unitName','unitSymbol'];
}
