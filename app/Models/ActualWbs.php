<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActualWbs extends Model
{
    //
    protected $table = 'actual_wbs';
    protected $primarykey='id';
    protected $fillable = ['itemName','parentItem','hasChild','qty','price','amount','weight','ProjectID','unitID','contractorID','CurrencyID','Created_By'];
}
