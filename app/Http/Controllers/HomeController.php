<?php

namespace App\Http\Controllers;
use App\User;
use App\Booking;
use App\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count() - 2;
        $bookings = Booking::count();
        $room = Room::count();
        $pending_rooms = Room::where('status',  '0')->count();

        $data = ['users'=>$users , 'bookings'=>$bookings , 'rooms' => $room , 'pending' => $pending_rooms];
        return view('home')->with('data',$data);
    }
}
