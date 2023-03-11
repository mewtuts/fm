<?php

use App\Models\Category;
use App\Models\Contents;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;
use App\Models\Templates;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::post('/register/store', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
 

//USERS LOGIN ROUTE
Route::get('/users/home', function(){
    return view('users.home', [
        'categories' => Category::get(),
        'contents' => Contents::get()
    ]);
});

Route::get('/users/logout', [UsersController::class, 'logout'])->name('logout');

Route::post('/users/home', [UsersController::class, 'create_parent_category'])->name('create_parent_category');

Route::get('/users/content/{template_id}', [UsersController::class, 'content']);

Route::post('/users/content/file/upload/{content_id}', [UsersController::class, 'upload_file']);

Route::post('/users/content/{template_id}/{name}/mkdir', [UsersController::class, 'mkdir']);
//END OF USERS LOGIN ROUTE

