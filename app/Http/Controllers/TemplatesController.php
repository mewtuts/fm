<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Templates;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TemplatesController extends Controller
{
    public function addTemplate(Request $request){

        $request->validate([
            'title' => 'required|regex:/^[a-zA-Z0-9\s]+$/'
        ]);

        $user_id = FacadesSession::get('user_id');

        $template = new Templates();
        $template->title = $request->title;
        $template->descriptions = $request->descriptions;
        $template->status = 0;
        $template->user_id = $user_id;
        $template->save();

        //getting the lates row in Contents Table
        $template_id = Templates::select('id')->latest('created_at')->first();

        $category = new Category();
        $category->user_id = $user_id;
        $category->title = $request->title;
        $category->template_id = $template_id->id;
        $category->status = 0;
        $category->save();

        //making folder inside the storage directory.
        //Storage::disk('local')->makeDirectory($request->title);

        //making folder inside the public directory.
        $oldName = public_path($request->title);
        if (File::exists($oldName)) {
            return redirect('/users/home');
        }else{
            File::makeDirectory(public_path($request->title));
            return redirect('/users/home');
        }
    }

    //method for deleting template
    public function delete_template(Request $request, $template_id){

        $category = Category::where('template_id', $template_id)->count();

        if ( $category >= 0 ) {

            session()->flash('message', 'All folders and files will be deleted. Are you sure you want to continue?');
            session()->put('template_id', $template_id);
            return redirect()->back();

        }

    }

    public function continue_delete_template(Request $request, $template_id){

        if ( $request->submit == "Continue" ) {

            $template = Templates::find($template_id);
            File::deleteDirectory($template->title);
            $template->delete();

            return redirect()->back()->with('success', 'Succesfully delete template');

        } else if ( $request->submit == "Cancel" ) {

            return redirect('/users/home');

        }

    }

    //method for editing template title
    public function editTemplate(Request $request, $template_id){
        //template field
        $template = Templates::find($template_id);

        $oldName = public_path($template->title);
        $newName = public_path($request->title);

        if (File::exists($oldName)) {
            File::move($oldName, $newName);

            $template->title = $request->title;
            $template->save();

            //category field
            $category_id = Category::select('id')
            ->where('parent_id', null)
            ->where('template_id', $template_id)->first();

            $category = Category::find($category_id->id);

            $category->title = $request->title;
            $category->save();

            return redirect()->back()->with('success', 'Folder renamed successfully');

        } else {

            return redirect()->back()->with('error', 'Folder not found');

        }
    }


    //method for editing desriptions of template
    public function editTemplateDescription(Request $request, $template_id){

        $template = Templates::find($template_id);
        $template->descriptions = $request->description;
        $template->save();

        return redirect()->back()->with('success', 'successfully update caption');

    }


    //method for changing the template status
    public function changeStatus(Request $request, $template_id){

        $template = Templates::find($template_id);

        //dd($template_id);

        if ( $template->status === '0' ) {

            $template->status = '1';
            $template->save();

            $category = Category::where('template_id', $template_id)
            ->update([
                'status' => '1'
            ]);

        } else {

            $template->status = '0';
            $template->save();

            $category = Category::where('template_id', $template_id)
            ->update([
                'status' => '0'
            ]);

        }

        return redirect()->back()->with('success', 'successfully change status');

    }
}
