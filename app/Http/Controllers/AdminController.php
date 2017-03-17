<?php

namespace App\Http\Controllers;

use App\Room;
use App\Path;
use Illuminate\Http\Request;
use Validator;
use Image;
use File;


class AdminController extends Controller
{

    public function addRoom()
    {
        return view('admin.add_room');
    }

    public function procssingEditRoom(Request $request,$id)
    {

        $data = $request->all();
        $this->validator_insertRoom($request->all())->validate();

        // dd($data['checkbox']);


        $room = Room::find($id);
        $room->ratings = $data['ratings'];
        if ($data['type'] == 'Single')
            $room->roomtype_id = 1;
        else if ($data['type'] == 'Double')
            $room->roomtype_id = 2;
        else if ($data['type'] == 'Suite')
            $room->roomtype_id = 3;

        $room->price = $data['price'];

        $room->beds = $data['beds'];
        $room->sofabeds = $data['sofabeds'];
        $room->room_size = $data['room_size'];
        $room->max_people = $data['max_people'];
        $room->room_number = $data['room_number'];
        $room->floor_number = $data['floor_number'];
        $room->description = $data['description'];

        foreach ($data['checkbox'] as $item) {

            $room->$item = 1;
        }

//        $room->room_service = $data['room_service'];
//        $room->laundary_service = $data['laundary'];
//        $room->pets = $data['pets'];
//        $room->internet = $data['internet'];
//        $room->facilities_for_disabled = $data['disabled'];
//        $room->security = $data['security'];
//        $room->bar = $data['bar'];


        $room->save();

        $files = $request->file('room_pictures');

        if(!empty($files)){
            $paths = Path::where('room_id',$room->id)->get();
            foreach($paths as $his_path)
            {

                $his_path->delete();
            }



                                            //   dd($files);
            foreach ($files as $file){
//                dd($file);


                $path = $file->getClientOriginalName();
                Image::make($file)->resize(1200, 400)->save(public_path('/images/' . $path));
                $image = new Path();
                $image->path = $path;
                $image->room_id = $room->id;
                $image->save();
            }

        }

        return redirect()->to('roomDetails/'.$room->id);


    }

    public function edit_room($id)
    {

        $room = Room::find($id);
        return view('admin.edit_room')->with('room',$room);
    }


    public function insertRoom(Request $request)
    {

        $data = $request->all();
        $this->validator_insertRoom($request->all())->validate();

         // dd($data['checkbox']);


        $room = new Room();
        $room->ratings = $data['ratings'];
        if ($data['type'] == 'Single')
            $room->roomtype_id = 1;
        else if ($data['type'] == 'Double')
            $room->roomtype_id = 2;
        else if ($data['type'] == 'Suite')
            $room->roomtype_id = 3;

        $room->price = $data['price'];

        $room->beds = $data['beds'];
        $room->sofabeds = $data['sofabeds'];
        $room->room_size = $data['room_size'];
        $room->max_people = $data['max_people'];
        $room->room_number = $data['room_number'];
        $room->floor_number = $data['floor_number'];
        $room->description = $data['description'];

        foreach ($data['checkbox'] as $item) {

            $room->$item = 1;
        }

//        $room->room_service = $data['room_service'];
//        $room->laundary_service = $data['laundary'];
//        $room->pets = $data['pets'];
//        $room->internet = $data['internet'];
//        $room->facilities_for_disabled = $data['disabled'];
//        $room->security = $data['security'];
//        $room->bar = $data['bar'];


        $room->save();

        $files = $request->file('room_pictures');

        if(!empty($files)){
         //   dd($files);
            foreach ($files as $file){
//                dd($file);


                $path = $file->getClientOriginalName();
                Image::make($file)->resize(1200, 400)->save(public_path('/images/' . $path));
                $image = new Path();
                $image->path = $path;
                $image->room_id = $room->id;
                $image->save();
            }

        }

        return redirect()->to('roomDetails/'.$room->id);

    }


    protected function validator_insertRoom(array $data)
    {

        return Validator::make($data, [

            'price' => 'required|numeric|min:0',
            'beds' => 'required|numeric|min:0|max:5',
            'sofabeds' => 'required|numeric|min:0|max:10',
            'room_size' => 'required|numeric|min:0',
            'max_people' => 'required|numeric|min:0|max:20',
            'room_number' => 'required|numeric|min:0|max:2000',
            'floor_number' => 'required|numeric|min:0|max:500',
        ]);
    }


    public function pendingRooms()
    {
        $rooms = Room::where('status', '0')->get();

        return view('admin.pending_rooms')->with('rooms', $rooms);

    }

}
