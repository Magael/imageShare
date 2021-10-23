<?php

use Admin\UserController;
use Illuminate\Support\Facades\Route;
use User\Profile;



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
    return view('index');
});

//

Route::resource('/blog', PostsController::class);

//User related pages
Route::prefix('user')->middleware(['auth'])->name('user.')->group(function (){
    Route::get('profile', Profile::class)->name('profile');
});

//Admin Routes
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function (){
    Route::resource('/users', UserController::class);
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

