<?php

namespace App\Http\Controllers;

use App\Models\Contents;
use App\Models\Files;
use App\Models\Templates;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class UsersController extends Controller
{
    public function template(Request $request){
        $request->validate([
            'name' => 'required|unique:templates'
        ]);
        $user_id = FacadesSession::get('user_id');

        $templates = new Templates();
        $templates->name = $request->name;
        $templates->user_id = $user_id;
        $templates->save();

        $dir = str_replace(' ', '', $request->name);

        Storage::disk('local')->makeDirectory($dir.$user_id);

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
            'templates' => Templates::select('name', 'id')->where('id', $template_id)->first(),
            'contents' => Contents::select('id', 'template_id', 'caption', 'parent_id')->where('template_id', $template_id)->get(),
            'files' => Files::select('id', 'content_id', 'path', 'year')->get()
        ]);

        // return view('users.content', [
        //     'contents' => Templates::join('contents', 'contents.template_id', '=', 'template_id')
        //                 ->join('files', 'files.content_id', '=', 'content_id')
        //                 ->where('contents.template_id', $template_id)
        //                 ->get(['templates.*', 'contents.*', 'files.*'])
        // ]);
    }

    public function mkdir(Request $request, $template_id, $name){

        //Checking if it have already parent id value in database. 
        $check = Contents::select('parent_id')->where('template_id', $template_id)->get();
        $checkCount = $check->count();

        if($checkCount <= 0){

            $user_id = FacadesSession::get('user_id');

            $contents = new Contents();
            $contents->caption = $request->name_folder;
            $contents->template_id = $template_id;
            $contents->user_id = $user_id;
            $contents->save();

            $dir = str_replace(' ', '', $name).$template_id;

            Storage::disk('local')->makeDirectory($dir.'/'.$request->name_folder.$user_id);
            
            return view('users.content', [
                'templates' => Templates::select('name', 'id')->where('id', $template_id)->first(),
                'contents' => Contents::select('id', 'template_id', 'caption', 'parent_id')->where('template_id', $template_id)->get(),
                'files' => Files::select('id', 'content_id', 'path', 'year')->get()
            ]);

        }else{

            $content_id = Contents::select('id')->where('template_id', $template_id)->first();


            $user_id = FacadesSession::get('user_id');

            $contents = new Contents();
            $contents->caption = $request->name_folder;
            $contents->template_id = $template_id;
            $contents->user_id = $user_id;
            $contents->parent_id = $content_id->id;
            $contents->save();

            $dir = str_replace(' ', '', $name).$template_id;

            Storage::disk('local')->makeDirectory($dir.'/'.$request->name_folder.$user_id);
            
            return view('users.content', [
                'templates' => Templates::select('name', 'id')->where('id', $template_id)->first(),
                'contents' => Contents::select('id', 'template_id', 'caption', 'parent_id')->where('template_id', $template_id)->get(),
                'files' => Files::select('id', 'content_id', 'path', 'year')->get()
            ]);
        }
    }

}
