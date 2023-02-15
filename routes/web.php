<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CustomerController;

//Route::get('/', function () {
//    return view('welcome');
//}) -> name('HomeIndex');
//
//
//Route::get('hello', [\App\Http\Controllers\HelloWorldController::class, 'hello']);
//
//Route::get('upload', [\App\Http\Controllers\UploadController::class, 'upload']);
//
//Route::get('login', [\App\Http\Controllers\LoginController::class, 'login']);
//
//Route::get('register', [\App\Http\Controllers\RegisterController::class, 'register']);
//
//Route::get('index_', function () {
//    return view('test');
//});
////Router Post
//Route::prefix('posts')->group(function () {
//    //List post
//    Route::get('/', [PostsController::class, 'index']);
//
//    //Get id_post
//    Route::get('/edit/{id_post}', [PostsController::class, 'getPost']);
//
//    // Update post
//    Route::post('/edit/{id_post}', [PostsController::class, 'updatePost']);
//
//    // Insert post
//    Route::get('/insert', [PostsController::class, 'addPost']);
//});


Route::get('/', [CustomerController::class, 'index'])->name('index');
//Route::get('/index1', [CustomerController::class, 'index1']);

Route::get('/add', [CustomerController::class, 'addCustomer'])->name('add');
Route::post('/add', [CustomerController::class, 'postCustomer'])->name('addCus');

Route::get('/update/{id}', [CustomerController::class, 'updateCustomer'])->name('updateCus');
Route::post('/update/{id}', [CustomerController::class, 'postUpdateCus'])->name('postUpdateCus');

Route::get('/del/{id}', [CustomerController::class, 'deleteCustomer'])->name('delete');
