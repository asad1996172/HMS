<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    //
    protected $fillable = [
        'id_user', 'token','updated_at','created_at'
    ];
}
