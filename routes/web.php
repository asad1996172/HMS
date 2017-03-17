<?php

use App\Roomtype;
use App\Role;
use App\User;
use App\Booking;
use App\Room;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $users = User::count() - 2;
    $bookings = Booking::count();
    $room = Room::count();
    $pending_rooms = Room::where('status',  '0')->count();

    $data = ['users'=>$users , 'bookings'=>$bookings , 'rooms' => $room , 'pending' => $pending_rooms];
    return view('home')->with('data',$data);
});
Route::get('/apis/getRooms','GuestController@getAllRooms');\
Route::get('/rooms','GuestController@show_rooms');
Route::get('/roomDetails/{id}','GuestController@room_details');
Route::get('/single','GuestController@single');
Route::get('/double','GuestController@double');
Route::get('/suite','GuestController@suite');

Route::post('/filteredRooms','CustomerController@filteringRooms');

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('user/activation/{token}', 'Auth\RegisterController@userActivation');

/** ---------------------------------------------------------------------------------------------------------------
    |
    |    TO GET ROLE OF A PARTICULAR USER IN MANY TO MANY
    |
---------------------------------------------------------------------------------------------------------------**/
//Route::get('/check',function(){
//
//    $user = Role::find(2);
//    foreach ($user->users as $role) {
//        echo $role->name . '<br>';
//    }
//
//});


/** ---------------------------------------------------------------------------------------------------------------
|
|    TO GET USER OF A PARTICULAR ROLE IN MANY TO MANY
|
---------------------------------------------------------------------------------------------------------------**/
//Route::get('/check',function(){
//
//    $user = User::find(1);
//    return $user->role->name;
//
//});



/** ---------------------------------------------------------------------------------------------------------------
|
|    TO GET ROOM OF A PARTICULAR TYPE IN ONE TO MANY
|
---------------------------------------------------------------------------------------------------------------**/
//Route::get('/check',function(){
//
//    $user = Roomtype::find(1);
//    foreach($user->rooms as $role)
//    {
//        echo $role->room_number.'<br>';
//    }
//
//
//});
//



/** ---------------------------------------------------------------------------------------------------------------
|
|    TO GET TYPE OF A PARTICULAR ROOM IN ONE TO MANY
|
---------------------------------------------------------------------------------------------------------------**/
//Route::get('/check',function(){
//
//$comment = Room::find(1);
//
//return $comment->type->name;
//});







/** ---------------------------------------------------------------------------------------------------------------
|   Application Routes via Middleware
|   ---------------------------------------------------------------------------------------------------------------
|   This route group applies the " web " middleware group to every route it  contains .
|   The " web " middleware group is defined in your HTTP kernel and includes session state,CSRF protection and more.
|
---------------------------------------------------------------------------------------------------------------**/
Route::group(['middleware'=>['auth','roles'] , 'roles' => 'Customer'],function(){

    Route::get('/profile','CustomerController@profile');

    Route::get('/bookings','CustomerController@booked_rooms');
    Route::get('/changePassword','CustomerController@changepass');
    Route::get('/bookRoom/{id}','CustomerController@book_room');
    Route::post('/process_booking/{id}','CustomerController@process_booking');

    Route::get('/booking/remove/{id}','CustomerController@remove_booking');
    Route::post('/update','CustomerController@update');
    Route::post('/updatePassword','CustomerController@updatePassword');

});


Route::group(['middleware'=>['roles'] , 'roles' => 'C.A'],function() {

    Route::get('/aboutUs','CustomerController@about');
    Route::get('/contactUs','CustomerController@contact');

});

Route::group(['middleware'=>['auth','roles'] , 'roles' => 'Combine'],function() {

    Route::get('/pendingRooms','AdminController@pendingRooms');

});











Route::group(['middleware'=>['auth','roles'] , 'roles' => 'Admin'],function() {


    Route::get('/admin/add_room','AdminController@addRoom');
    Route::post('/admin/edit_this_Room/{id}','AdminController@procssingEditRoom');
    Route::get('/admin/edit_Room/{id}','AdminController@edit_room');
    Route::post('/admin/addRoom','AdminController@insertRoom');
});











Route::group(['middleware'=>['auth','roles'] , 'roles' => 'Manager'],function() {




    Route::post('/edit_price/{id}','ManagerController@editPrice');
    Route::get('/manager/room/approve/{id}','ManagerController@approve');
});


//
//Auth::routes();
//
//Route::get('admin/suck_it', [
//    'middleware' => ['auth', 'roles'],
//    'uses' => 'AdminController@index',
//    'roles' => 'Admin'
//]);