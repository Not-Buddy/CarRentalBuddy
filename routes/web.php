<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FruitController;
//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', function () {
    return view('home');
});


Route::post('/register',[UserController::class, 'register']);
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/login',[UserController::class,'login']);

  Route::get('/fruits', [FruitController::class, 'index']);

  Route::get('/logged-in', [CarController::class, 'logged_in']); //passes to loggedinpage


  Route::get('/cars',[CarController::class,'index']);
  Route::get('/welcome' ,function(){
    return view('welcome');
  });
  Route::post('/book-car/{id}', [CarController::class, 'book'])
    ->name('book.car')
    ->middleware('auth');

Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');


  
// Route::post('/register', function(){
//     return 'thank you';
// });
//Time to put this in a Controller