<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BussinessPartner extends Model
{
    //
    protected $primarykey='id';
    protected $fillable = ['BussinessName','BussinessTypeID','Address',
                            'CountryID','CityID','Phone','Fax','Web'];

}
