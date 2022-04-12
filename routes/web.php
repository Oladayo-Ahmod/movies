<?php

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
// use Session;
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
Route::get('filter_movies/{id}',[MoviesController::class,'show'])->name('movies.filter');
Route::view('login', 'login');
Route::post('/movies',[UserController::class, 'login']);
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
}); // user logout route