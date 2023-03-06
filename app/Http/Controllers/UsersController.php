<?php

namespace App\Http\Controllers;

use App\Models\Contents;
use App\Models\Templates;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function template(Request $request){
        $request->validate([
            'name' => 'required|unique:templates'
        ]);

        $templates = new Templates();
        $templates->name = $request->name;
        $templates->save();

        return redirect(route('templates'))->with('successs', 'Template created success!');

    }

    public function logout(){
        
        session()->getHandler()->destroy('username');
        session()->getHandler()->destroy('id_number');
        session()->getHandler()->destroy('first_name');
        session()->getHandler()->destroy('middle_name');
        session()->getHandler()->destroy('last_name');
        session()->getHandler()->destroy('email');
       
        return view('login')->with('Success message');
    }

    public function templates(){
        return view('users.home', [
            'templates' => Templates::get()
        ]);
    }

    public function content($template_id){
            
        return view('users.content', [
            'contents' => Templates::select('name')->where('id', $template_id)->first()
        ]);
        // return view('users.content', [
        //     'contents' => Templates::join('contents','contents.id','=','templates.id')
        //         ->where(' templates.id', $template_id)
        //         ->get()
        // ]);
    }
}
