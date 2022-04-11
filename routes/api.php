<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// movies routes
Route::get('movies', [MoviesController::class, 'index']);
Route::get('movies/{id}', [MoviesController::class, 'show']);
Route::post('movies', [MoviesController::class, 'store']);
Route::put('movies/{id}', [MoviesController::class, 'update']);
Route::delete('movies/{id}', [MoviesController::class, 'delete']);
Route::post('/filter_movies',[MoviesController::class,'show'])->name('movies.filter');
