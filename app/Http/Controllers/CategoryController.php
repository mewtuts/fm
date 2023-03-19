<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session as FacadesSession;
use App\Models\Category;
use App\Models\Files;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function file($template_id){

        $category_id = Category::select('id')->where('template_id', $template_id)->first();

        $category = Category::find($category_id->id);

        $category_ids = $category->getDescendants($category);

        $categories = Category::tree()
        ->with('getFiles')
        ->where('template_id', $template_id)
        ->get()
        ->toTree();

        session()->put('template_id', $template_id);

        return view('users.file', [
            'categories' => $categories,
            'category_ids' => $category_ids
        ]);
    }


    public function addParentFolder(Request $request){

        $request->validate([
            'title' => 'required'
        ]);

        $user_id = FacadesSession::get('user_id');

        $category = new Category();
        $category->title = $request->title;
        $category->user_id = $user_id;
        $category->save();

        //getting the lates row in Contents Table
        $category = Category::select('id')->latest('created_at')->first();

        //Storage::disk('local')->makeDirectory($request->title);

        return redirect()->back();
    }


    //method for storing new sub parent folder.
    public function storeSubParent(Request $request){
        //validation for request input.
        $request->validate([
            'title' => 'required'
        ]);

        //getting the user id from session
        $user_id = FacadesSession::get('user_id');

        //getting the template id from session
        $template_id = FacadesSession::get('template_id');

        //getting the parent title, id and user id
        $parent_category = Category::select('id', 'title')->where('id', $request->parent_id)->first();

        //getting the latest row in Contents Table
        $category_latest_id = Category::select('id')->latest('created_at')->first();

        //calling category table from database to store input request.
        $category = new Category();
        $category->user_id = $user_id;
        $category->template_id = $template_id;
        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->save();

        //making a directory folder in local directory path 'storage/app'
        //Storage::disk('local')->makeDirectory($request->title, '');

        //return to current page.
        return redirect()->back();
    }


    //method for uploading file
    public function uploadFile(Request $request){
        //dd($request);
        $request->validate([
            'file' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx,jpg,png|max:204800',
            'parent_id' => 'required'
        ]);

        //getting the user id from session
        $user_id = FacadesSession::get('user_id');

        //getting the template id from session
        $template_id = FacadesSession::get('template_id');

        //getting the parent title, id and user id
        $parent_category = Category::select('id', 'title')->where('id', $request->parent_id)->first();

        //Storing the file name
        $uploaded_file = $request->file->getClientOriginalName();
        $file_name = pathinfo($uploaded_file,PATHINFO_FILENAME);

        //Storing the file type
        $file_type = $request->file->extension();

        //Storing the file size in bytes
        $file_size = $request->file->getSize();

        //Storing file path and uploading the file
        $file_path = storage_path($parent_category->title.$user_id);

        $file = new Files();
        $file->category_id = $request->parent_id;
        $file->file_name = $file_name;
        $file->file_type = $file_type;
        $file->file_size = $file_size;
        $file->file_path = $file_path;
        $file->save();

        //$request->file('file')->storeAs($parent_category->title, $file_name.'_'.$user_id.".".$file_type);
        $request->file->move($parent_category->title, $file_name.'_'.$user_id.".".$file_type);

        return redirect()->back()->with('success', 'succesfully upload file');
    }


    //method for showing the content of selected file
    // public function viewFile(Request $request, $title, $file_id){
    //     // Disable the debug mode to prevent PHP warnings from being displayed
    //     Settings::setOutputEscapingEnabled(true);

    //     $files = Files::find($file_id);

    //     $user_id = FacadesSession::get('user_id');

    //     $title = $title;

    //     $path = '/app/'.$title.'/'.$files->file_name.'_'.$user_id.'.'.$files->file_type;

    //     // Read the DOCX file and convert it to HTML
    //     $phpword = IOFactory::load(storage_path($path));

    //     $tempFile = tempnam(sys_get_temp_dir(), 'phpword');
    //     $htmlWriter = IOFactory::createWriter($phpword, 'HTML');
    //     $htmlWriter->save($tempFile);

    //     $html = file_get_contents($tempFile);

    //     return view('users.viewFile', compact('html'));

    // }
    //method for showing the content of selected file
    public function viewFile(Request $request, $title, $file_id){

        $files = Files::find($file_id);

        $user_id = FacadesSession::get('user_id');

        $title = $title;

        $path = '/'.$title.'/'.$files->file_name.'_'.$user_id.'.'.$files->file_type;

        return view('users.viewFile', compact('path'));

    }


    //method for downloading the uploaded file
    public function downloadFile($folder, $file_id){

        $file = Files::select('id','category_id','file_name','file_type','file_size','file_path')->where('id', $file_id)->first();

        //getting the user id from session
        $user_id = FacadesSession::get('user_id');
        $path = '/'.$folder.'/'.$file->file_name.'_'.$user_id.'.'.$file->file_type;

        return response()->download(public_path($path));

    }


    //method for deleting sub folder or file
    public function delete_sff(Request $request){
        //dd($request->submit);
        $folder = "folder";
        $file = "file";

        switch ($request->submit) {
            case 'delete':
                // if is folder
                if ( Str::contains($request->id, $folder) ) {

                    $folder_id = Str::replaceFirst($folder, '', $request->id);

                    $category = Category::find($folder_id);

                    if ( $category->parent_id === null ) {
                        return redirect()->back()->with('error', 'something went wrong');
                    }

                    else {

                        $category->delete();

                        File::delete($category->title);

                        return redirect()->back();

                    }

                }
                // if is file
                elseif ( Str::contains($request->id, $file) ) {

                    $file_id = Str::replaceFirst($file, '', $request->id);

                    $file = Files::find($file_id);

                    $category = Category::select('id', 'user_id', 'template_id', 'title', 'parent_id')->where('id', $file->category_id)->first();

                    File::delete($category->title.'/'.$file->file_name.'_'.$category->user_id.'.'.$file->file_type);
                    $file->delete();

                    return redirect()->back();

                }

                else {



                }

                break;

            case 'update':
                # code...
                break;

            default:
                # code...
                break;
        }

    }

}
