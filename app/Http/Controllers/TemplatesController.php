<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Templates;
use App\Models\Category;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;

class TemplatesController extends Controller
{
    public function addTemplate(Request $request){

        $request->validate([
            'title' => 'required|regex:/^[a-zA-Z\s]+$/'
        ]);

        $user_id = FacadesSession::get('user_id');

        $template = new Templates();
        $template->title = $request->title;
        $template->user_id = $user_id;
        $template->save();

        //getting the lates row in Contents Table
        $template_id = Templates::select('id')->latest('created_at')->first();

        $category = new Category();
        $category->user_id = $user_id;
        $category->title = $request->title;
        $category->template_id = $template_id->id;
        $category->save();

        //Storage::disk('local')->makeDirectory($request->title);

        return redirect('/users/home');
    }

    //method for deleting template
    public function delete_template($template_id){

        $template = Templates::find($template_id);
        $template->delete();

        return redirect()->back()->with('success', 'Succesfully delete template');

    }
}
