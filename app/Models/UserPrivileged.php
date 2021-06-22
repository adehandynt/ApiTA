<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPrivileged extends Model
{
    //
    protected $table='UserPrivileged';
    protected $primarykey='id';
    protected $fillable = ['UserPrivileged','PrivilegedNameID','status'];
}
