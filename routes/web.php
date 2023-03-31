<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Models\Category;
use App\Models\Contents;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;
use App\Models\Templates;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Template\Template;

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
Route::get('/users/folderfiles', function () {
    return view('users.folderfiles');
});


Route::post('/register/store', [RegisterController::class, 'register'])->name('register');


//route for user home page
Route::get('/users/home', function(){

    //getting the user id from session
    $user_id = FacadesSession::get('user_id');

    $template = Templates::where('user_id', $user_id)->get();

    return view('users.home', [

        'templates' => $template

    ]);
});


Route::controller(TemplatesController::class)->group(function () {
    //route for adding template
    Route::post('/users/addTemplate', 'addTemplate');

    //route for updating template title
    Route::post('/users/editTemplate/{template_id}', 'editTemplate');

    //route for delete template
    Route::get('/users/delete_template/{template_id}', 'delete_template');

    Route::post('/users/continue_delete_template/{template_id}', 'continue_delete_template');

    //route for updating template descriptions
    Route::post('/users/editDescription/{template_id}', 'editTemplateDescription');
});


Route::controller(LoginController::class)->group(function () {
    //route for login
    Route::post('/login', 'login')->name('login');

    //route for logout
    Route::get('/users/logout', 'logout');
});


Route::controller(CategoryController::class)->group( function () {
    //route for viewing file page
    Route::get('/users/file/{template_id}', 'file');

    //route for storing sub parent folder
    Route::post('/users/storeSubParent', 'storeSubParent')->name('storeSubParent');

    //route for uploading file
    Route::post('/users/uploadFile', 'uploadFile')->name('uploadFile');

    //route for uploading URL
    Route::post('/users/uploadUrl', 'uploadUrl')->name('uploadUrl');

    //route for viewing the uploaded file
    Route::get('/users/viewFile/{title}/{file_id}', 'viewFile');

    //route for downloading the uploaded file
    Route::get('/users/downloadFile/{folder}/{file_id}', 'downloadFile');

    //route for deleting sub folder and files
    Route::post('/users/delete_sff', 'delete_sff');

    Route::post('/users/home', 'addParentFolder')->name('addParentFolder');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/users/content/{template_id}', 'content');

    Route::post('/users/content/file/upload/{content_id}', 'upload_file');

    Route::post('/users/content/{template_id}/{name}/mkdir', 'mkdir');
});
