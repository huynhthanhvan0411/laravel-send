<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\API\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// // });

//post 
 Route::prefix('post')->name('post.')->group(function(){
        Route::get('/',[PostController::class,'index'])->name('show');
        Route::delete('/delete/{id}',[PostController::class,'destroy'])->name('delete');
});
//profile 
Route::prefix('profile')->name('profile.')->group(function(){
    Route::get('',[ProfileController::class,'index'])->name('show');
    Route::delete('/delete/{id}',[ProfileController::class,'destroy'])->name('delete');
});

//auth 
Route::prefix('auth')->name('auth.')->group(function(){
    Route::post('/login',[AuthController::class,'login'])->name('login');
    Route::post('/register',[AuthController::class,'register'])->name('register');


    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::post('/refresh',[AuthController::class,'refresh'])->name('refresh');
});