<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personil extends Model
{
    //
    protected $primarykey='id';
    protected $fillable = ['BussinessPartnerID', 'PersonilName', 'Address', 'Postzip', 
    'CountryID', 'CityID', 'Phone','Hp', 'Email', 'PositionID'];
}
