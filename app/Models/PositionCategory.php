<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionCategory extends Model
{
    //
    protected $table='PositionCategory';
    protected $primarykey='id';
    protected $fillable = ['CategoryName','CategoryDesc'];
}
