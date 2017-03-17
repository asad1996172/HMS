<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    protected $fillable = ['name'];

    public function room()
    {
        return $this->belongsTo('App\Room','room_id','id');
    }
}
