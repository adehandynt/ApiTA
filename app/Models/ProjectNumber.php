<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectNumber extends Model
{
    //
    protected $primarykey='id';
    protected $fillable = ['ContractNumber', 'ProjectID', 'BusinessPartnerID','PositionID', 'StartDate', 
    'EndDate', 'TotalAmount', 'ScopeOfWork'];
}
