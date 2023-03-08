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
            'name' => 'required|alpha_dash|unique:templates'
        ]);

        $user_id = FacadesSession::get('user_id');

        $request->validate([
            'name' => 'required|alpha_dash|unique:templates'
        ]);

        $template = new Templates();
        $template->name = $request->name;
        $template->user_id = $user_id;
        $template->save();
        
        //getting the lates row in Contents Table
        $template = Templates::select('id')->latest('created_at')->first();

        $contents = new Contents();
        $contents->caption = $request->name;
        $contents->template_id = $template->id;
        $contents->user_id = $user_id;
        $contents->save();
        
        Storage::disk('local')->makeDirectory($user_id.'_'.$request->name);

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
            'templates' => Templates::get(),
            'contents' => Contents::get()
        ]);
    }

    public function content($template_id){  

        $contents = Contents::select('id')->where('template_id', $template_id)->first();

        return view('users.content', [
            'templates' => Templates::select('name', 'id')->where('id', $template_id)->first(),
            'contents' => Contents::select('id', 'template_id', 'caption', 'parent_id')->where('template_id', $template_id)->get(),
            'files' => Files::select('id', 'content_id', 'path', 'year')->get(),
            'content_id' => $contents->id
        ]);
    }

    public function mkdir(Request $request, $template_id, $name){
        $request->validate([
            'caption' => 'required|alpha_dash|unique:contents'
        ]);
        //Checking if it have already parent id value in database. 
        $check = Contents::select('parent_id', 'id')->where('template_id', $template_id)->get();
        $checkCount = $check->count();

        if($checkCount <= 0){

            $user_id = FacadesSession::get('user_id');

            $contents = new Contents();
            $contents->caption = $request->name_folder;
            $contents->template_id = $template_id;
            $contents->user_id = $user_id;
            $contents->save();

      

            Storage::disk('local')->makeDirectory($user_id.'_'.$name.'/'.$request->name_folder);
            
            return view('users.content', [
                'templates' => Templates::select('name', 'id')->where('id', $template_id)->first(),
                'contents' => Contents::select('id', 'template_id', 'caption', 'parent_id')->where('template_id', $template_id)->get(),
                'files' => Files::select('id', 'content_id', 'path', 'year')->get(),
                'content_id' => $check->id
            ]);

        }else{
            $request->validate([
                'caption' => 'required|alpha_dash|unique:contents'
            ]);
            $content_id = Contents::select('id')->where('template_id', $template_id)->first();


            $user_id = FacadesSession::get('user_id');

            $contents = new Contents();
            $contents->caption = $request->name_folder;
            $contents->template_id = $template_id;
            $contents->user_id = $user_id;
            $contents->parent_id = $content_id->id;
            $contents->save();

            $dir = str_replace(' ', '', $name);

            Storage::disk('local')->makeDirectory($user_id.'_'.$name.'/'.$request->name_folder);
            
            return view('users.content', [
                'templates' => Templates::select('name', 'id')->where('id', $template_id)->first(),
                'contents' => Contents::select('id', 'template_id', 'caption', 'parent_id')->where('template_id', $template_id)->get(),
                'files' => Files::select('id', 'content_id', 'path', 'year')->get(),
                'content_id' => $content_id->id
            ]);
        }
    }

    public function upload_file(Request $request, $content_id){
       
        $user_id = FacadesSession::get('user_id');

        $contents = Contents::select('template_id', 'caption')->where('id', $content_id)->first();
        $templates = Templates::select('id', 'name')->where('id', $contents->template_id)->first();

        $filename = $request->file('file')->getClientOriginalName();
        $path = storage_path($user_id.'_'.$templates->name.'/'.$contents->caption.'.'.$filename);

        $files = new Files();
        $files->user_id = $user_id;
        $files->content_id = $content_id;
        $files->path = $path;
        $files->year = now();
        $files->save();

        $request->file('file')->store($user_id.'_'.$templates->name.'/'.$contents->caption);

        return redirect('/users/content/'.$content_id);

        
    }

}
