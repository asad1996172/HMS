<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Image;
use Mail;
use Validator;
use App\UserActivation;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'photo' => 'mimes:jpg,jpeg,bmp,png|max:10000'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(Request $request)
    {

        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $path = $avatar->getClientOriginalName();
            Image::make($avatar)->resize(300, 300)->save(public_path('/images' . $path));
        } else {
            $path = 'avatar04.png';
        }
        $data = $request->all();
        return User::create([
            'path' => $path,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);
        if ($validator->passes()) {
            $user = $this->create($request)->toArray();
            $user['link'] = str_random(30);
            //DB::table('user_activations')->insert(['id_user' => $user['id'], 'token' => $user['link']]);
            $usera = new UserActivation();
            $usera->id_user = $user['id'];
            $usera->token = $user['link'];
            $usera->save();
            Mail::send('emails.activation', $user, function ($message) use ($user) {
                $message->to($user['email']);
                $message->subject('HMS - Registration Activation Code');

            });
            return redirect()->to('login')->with('Success', "We sent an activaiton code. Please check your email");
        }

        return back()->with('errors', $validator->errors());

    }


    public function userActivation($token)
    {

        $check = DB::table('user_activations')->where('token',$token)->first();
        if(!is_null($check)){
            $user = User::find($check->id_user);
            if($user->activated == 1)
            {
                return redirect()->to('login')->with('Success','User is Already Activated');
            }
            $user->activated = 1;
            $user->save();
            //DB::table('user_activations')->where('token',$token)->delete();
            $room = UserActivation::where('token', $token)->delete();
            return redirect()->to('login')->with('Success','User Activated Successfully !!');
        }
        return redirect()->to('login')->with('Warning','Your Token is Invalid');
    }

}
