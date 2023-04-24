<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\Profile\ProfileController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

//Admin Route
//Logout 
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('admin.logout');

//User Management System
Route::prefix('Users')->group(function(){

    //view.user
    Route::get('/view',[UsersController::class,'view'])->name('view.user');
    //user.add
    Route::get('/add',[UsersController::class,'add'])->name('user.add');
    //store.user
    Route::post('/store',[UsersController::class,'store'])->name('store.user');
    //user.edit
    Route::get('/edit/{id}',[UsersController::class,'edit'])->name('user.edit');
    //user.update
    Route::post('/update/{id}',[UsersController::class,'update'])->name('user.update');
    //user.delete
    Route::get('/delete/{id}',[UsersController::class,'delete'])->name('user.delete');

});

//Your Profile & Change Password rooute
Route::prefix('profile')->group(function(){

    //your.profile
    Route::get('/view',[ProfileController::class,'profile'])->name('your.profile');

    //edit.profile
    Route::get('/edit',[ProfileController::class,'edit'])->name('edit.profile');

    //update.profile
    Route::post('/store',[ProfileController::class,'update'])->name('update.profile');

    //password.view
    Route::get('/password/view',[ProfileController::class,'passwordView'])->name('password.view');

    //password.update
    Route::post('/password/update',[ProfileController::class,'passwordUpdate'])->name('password.update');
    

});
