<?php

namespace App\Http\Controllers;
use App\Room;
use Illuminate\Http\Request;
use Validator;
class ManagerController extends Controller
{
    public function approve($id){

        $room = Room::find($id);
        $room->status = 1;
        $room->save();

        return redirect()->back();
    }

    public function editPrice(Request $request,$id){
        $this->validator_editPrice($request->all())->validate();

        $room = Room::find($id);
        $room->price = $request->all()['edit_price'];
        $room->save();

        return redirect()->to('roomDetails/'.$id);

    }

    protected function validator_editPrice(array $data)
    {

        return Validator::make($data, [
            'edit_price' => 'numeric|min:0',

        ]);
    }
}
