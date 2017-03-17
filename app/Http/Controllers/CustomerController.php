<?php

namespace App\Http\Controllers;

//namespace Illuminate\Foundation\Auth;
use App\Booking;
use App\Room;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Validator;
use File;
class CustomerController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function filteringRooms(Request $request)
    {


        $this->validator_filtering($request->all())->validate();
        $data = $request->all();
        $val = 0;
        if ($data['type'] == 'Single Room')
            $val = 1;
        else if ($data['type'] == 'Double Room')
            $val = 2;
        else if ($data['type'] == 'Suite')
            $val = 3;
        if ($data['price'] == null)
            $data['price'] = 100000000;
        if ($data['room'] == null)
            $rooms = Room::where('ratings', '>=', $data['rating'])->where('roomtype_id', $val)->where('price', '<', $data['price'])->get();
        else
            $rooms = Room::where('room_number',  $data['room'])->get();
        return view('rooms')->with('rooms', $rooms);
    }


    public function book_room($id)
    {
        $room = Room::find($id);
        return view('customer.book_room')->with('room', $room);
    }


    public function process_booking(Request $request, $id)
    {
        $this->validator_roomBooking($request->all())->validate();
        $data = $request->all();

        $room = Room::find($id);
        $room->booked = 1;
        $room->ending_date_of_booking = $data['ending_date'];
        $room->save();

        $booking = new Booking();
        $booking->room_type = $room->type->name;
        $booking->starting_date = $data['starting_date'];
        $booking->ending_date = $data['ending_date'];
        $booking->total_amount = $data['nights'] * $room->price;
        $booking->total_stay = $data['nights'];
        $booking->total_people = $data['people'];
        $booking->room_number = $room->room_number;
        $booking->user_id = Auth::user()->id;

        $booking->save();

        $bookings = User::find(Auth::user()->id)->bookings;
//        foreach ($user->bookings as $booking) {
//            echo $booking->room_type . '<br>';
//        }

        return view('customer.booked_rooms')->with('bookings', $bookings);;
    }

    protected function validator_roomBooking(array $data)
    {

        return Validator::make($data, [
            'starting_date' => 'required|date|before_equal',
            'ending_date' => 'required|date|before_equal|greater_date',
            'people' => 'required|numeric|min:0|max:10|nomore',
            'nights' => 'required|numeric|min:0',
        ]);
    }

    protected function validator_filtering(array $data)
    {

        return Validator::make($data, [
            'price' => 'numeric|min:0',
            'room' => 'numeric|min:0',
        ]);
    }

    public function remove_booking($id)
    {

        $user = User::find(Auth::user()->id);
        $booking = Booking::find($id);
        $room_number = $booking->room_number;
        $room = Room::where('room_number', $room_number)->first();
        $room['booked'] = 0;
        $room['ending_date_of_booking'] = null;
        $room->save();

        $user->bookings()->whereId($id)->delete();


        return redirect()->to('bookings');
    }

    public function booked_rooms()
    {

        $bookings = User::find(Auth::user()->id)->bookings;
//        foreach ($user->bookings as $booking) {
//            echo $booking->room_type . '<br>';
//        }

        return view('customer.booked_rooms')->with('bookings', $bookings);

    }

    public function about()
    {
        return view('customer.about');
    }

    public function contact()
    {
        return view('customer.contact');
    }

    public function changepass()
    {
        session_start();
        return view('customer.changepass');
    }


    public function profile()
    {
        return view('customer.editprofile');
    }

    public function update(Request $request)
    {
        $id = Auth::User()->id;
//        return ('hello id '.$id);
        $this->validator($request->all())->validate();
        $data = $request->all();
        $user = User::find($id);

        if ($request->hasFile('photo')) {

            $avatar = $request->file('photo');
            $path = $avatar->getClientOriginalName();

            Image::make($avatar)->resize(300, 300)->save(public_path('/images/' . $path));

            $user->path = $path;
            $user->name = $data['name'];

        } else {
            $user->name = $data['name'];
        }


        $this->guard()->login($user);
        $user->save();
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::User()->id;
        $data = $request->all();
//        return ('hello id '.$id);

        $user = User::find($id);
        $this->validator_password($request->all(), $id)->validate();
//        if (Hash::check($data['old_password'], $hashedPassword)) {

        if(!(($data['password'] == $data['password_confirmation'])&&($user->password == $data['orignal']) ) )
        {
            echo "Update Failed";
        }
        else {
            $user->password = bcrypt($data['password']);


            $this->guard()->login($user);
            $user->save();
            echo "success";
        }
//        }
//        else{
//
//            return redirect()->back();
//        }

    }


    protected function validator_password(array $data, $id)
    {

        return Validator::make($data, [
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     */

    protected function guard()
    {
        return Auth::guard();
    }

    protected function registered(Request $request, $user)
    {
    }

    public function redirectPath()
    {
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
