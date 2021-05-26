<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'City';
    protected $primarykey='id';
    protected $fillable = ['CityName','CountryID' ];

}
