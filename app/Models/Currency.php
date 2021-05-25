<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //  
    protected $table = 'Currency';
    protected $primarykey='id';
    protected $fillable = ['CountryID','CurrencyName'];
}
