<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function file($category_id){

        $categories = Category::where('id', $category_id)->get();

        return view('users.file', [
            'categories' => $categories
        ]);
    }
}
