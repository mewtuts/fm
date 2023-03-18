<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Contents;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TemplatesController;
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


//route for user home page
Route::get('/users/home', function(){
    return view('users.home', [
        'templates' => Templates::get()
    ]);
});

//route for adding template
Route::post('/users/addTemplate', [TemplatesController::class, 'addTemplate']);

//route for viewing file page
Route::get('/users/file/{template_id}', [CategoryController::class, 'file']);

//route for storing sub parent folder
Route::post('/users/storeSubParent', [CategoryController::class, 'storeSubParent'])->name('storeSubParent');

//route for uploading file
Route::post('/users/uploadFile', [CategoryController::class, 'uploadFile'])->name('uploadFile');

//route for viewing the uploaded file
Route::get('/users/viewFile/{title}/{file_id}', [CategoryController::class, 'viewFile']);

//route for downloading the uploaded file
Route::get('/users/downloadFile/{folder}/{file_id}', [CategoryController::class, 'downloadFile']);

//route for logout
Route::get('/users/logout', [LoginController::class, 'logout']);

//route for delete template
Route::get('/users/delete_template/{template_id}', [TemplatesController::class, 'delete_template']);
























Route::post('/users/home', [CategoryController::class, 'addParentFolder'])->name('addParentFolder');

Route::get('/users/content/{template_id}', [UsersController::class, 'content']);

Route::post('/users/content/file/upload/{content_id}', [UsersController::class, 'upload_file']);

Route::post('/users/content/{template_id}/{name}/mkdir', [UsersController::class, 'mkdir']);
//END OF USERS LOGIN ROUTE

