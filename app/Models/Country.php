<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'country';
    protected $primarykey='id';
    protected $fillable = ['CountryName'];
}
