<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'ratings',
        'type_id',
        'price',
        'beds',
        'sofabeds',
        'room_size',
        'max_people',
        'room_number',
        'description',
        '24/7_room_service',
        'laundary_service',
        'pets',
        'internet',
        'floor_number',
        'security',
        'bar',
        'booked',
        'ending_date_of_booking',
        'status',
        'facilities_for_disabled'
    ];

    public function type()
    {
        return $this->belongsTo('App\Roomtype','roomtype_id','id');
    }

    public function pictures(){

        return $this->hasMany('App\Path');

    }

}
