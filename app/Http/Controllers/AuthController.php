<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
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
        Auth::logout(); // logging out user
        return Redirect::to('login'); // redirection to login screen
    }

    public function doLogin()
    {

          // create our user data for the authentication
          $userdata = array(
              'email' => Input::get('email') ,
              'password' => Input::get('password')
          );
            dd($userdata);
          // attempt to do the login
          if (Auth::attempt($userdata))
          {
              // validation successful
              // do whatever you want on success
          }else{
              // validation not successful, send back to form
              return Redirect::to('checklogin');
          }
      }
//      }
//}
}
