<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Form View
        return view('login');
    }

    public function doLogout()
    {
        Auth::logout();

        return Redirect::to('/');
    }

    public function doLogin(Request $request)
    {

          $credentials = $request->only('email','password');

          if (Auth::attempt($credentials))
          {
              return Redirect::to('/');
          }else{

//              return Redirect::to('checklogin');
          }
      }

      public function register(Request $request){

          $userdata = array(
              'email'       => $request->get('email') ,
              'password'    => $request->get('password'),
              'name'        => $request->get('name_user')
          );
           
          $user = new User();
          $user->password = Hash::make($userdata['password']);
          $user->email = $userdata['email'];
          $user->name = $userdata['name'];
          $user->save();

          auth()->login($user);
          return response()->json(['success'=>'Ajax request submitted successfully']);
      }
}
