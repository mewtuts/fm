<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session as FacadesSession;
use App\Models\Category;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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
      
        return view('users.file', [
            'categories' => $categories,
            'category_ids' => $category_ids
        ]);
    }


    public function addParentFolder(Request $request){
        $request->validate([
            'title' => 'required|alpha_dash|unique:categories'
        ]);

        $user_id = FacadesSession::get('user_id');

        $category = new Category();
        $category->title = $request->title;
        $category->user_id = $user_id;
        $category->save();
        
        //getting the lates row in Contents Table
        $category = Category::select('id')->latest('created_at')->first();
        
        Storage::disk('local')->makeDirectory($request->title);

        return redirect('/users/home');
    }

}
