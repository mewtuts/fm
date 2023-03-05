<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        if(isset($request->login))
        {
            $users = Users::Select('id', 'username', 'password', 'id_number', 'first_name', 'middle_name', 'last_name', 'email')->where('username', $request->username)->where('password', $request->password)->first();
            if($users)
            {
                session()->put('username', $users->username);
                session()->put('id_number', $users->id_number);
                session()->put('first_name', $users->first_name);
                session()->put('middle_name', $users->middle_name);
                session()->put('last_name', $users->last_name);
                session()->put('email', $users->email);

                return redirect('users/home');

            }else
            {
                return view('login')->with('error', 'The username you have enter is not registered');
            }
            
        }else
        {

        }
    }

    public function logout()
    {
        session()->getHandler()->destroy('username');
        return view('login');
    
    }
}
