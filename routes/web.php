<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//     // get data from a database

Route::get('/pizzas', 'App\Http\Controllers\PizzaController@index')->middleware('auth');
Route::post('/pizzas', 'App\Http\Controllers\PizzaController@store');
Route::get('/pizzas/create', 'App\Http\Controllers\PizzaController@create')->name('pizzas.create');
Route::get('/pizzas/{id}', 'App\Http\Controllers\PizzaController@show')->middleware('auth');
Route::delete('/pizzas/{id}', 'App\Http\Controllers\pizzaController@destroy')->middleware('auth');

//to disable the registration once we have registered else no args
Auth::routes([
    'register'=>false
]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
