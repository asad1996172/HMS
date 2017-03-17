<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_type',
        'starting_date',
        'ending_date',
        'total_amount',
        'total_stay',
        'total_people',
        'room_number',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function StartingDateDescending($query)
    {
        return $query->orderBy('starting_date','DESC');
    }
}
