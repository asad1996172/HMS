<?php

namespace App\Http\Controllers;

use App\Room;
use Auth;

class GuestController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('guest');
    }
// api for getting all the rooms

    public function getAllRooms(){
        $rooms = Room::all();
        return $rooms;
    }






    public function single()
    {

        $rooms = Room::where('roomtype_id', '1')->where('status', '1')->get();


        return view('rooms')->with('rooms', $rooms);
    }

    public function double()
    {

        $rooms = Room::where('roomtype_id', 2)->where('status', '1')->get();
        return view('rooms')->with('rooms', $rooms);
    }

    public function suite()
    {

        $rooms = Room::where('roomtype_id', 3)->where('status', '1')->get();
        return view('rooms')->with('rooms', $rooms);
    }


    public function show_rooms()
    {

        if (Auth::check())
            if (Auth::user()->name == 'Admin' || Auth::user()->name == 'Manager')
                $rooms = Room::all();
            else
                $rooms = Room::where('status', '1')->get();
        else
            $rooms = Room::where('status', '1')->get();


        return view('rooms')->with('rooms', $rooms);
    }

    public function room_details($id)
    {

        $room = Room::find($id);

        return view('room_details')->with('room', $room);
    }
}
