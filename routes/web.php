<?php

// use App\Http\Controllers\Users\UsersController;
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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('users')->namespace('Users')->name('users.')->middleware(['web' , 'auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Users\UsersController::class, 'index'])->name('dashboard');
    // Route::get('/manages', [App\Http\Controllers\ManageController::class, 'index'])->name('manage');

});