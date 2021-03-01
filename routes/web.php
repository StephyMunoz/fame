<?php

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




Route::get('home',function(){
    return view('home');
 })->name('home');
 Route::get('/',function(){
    return view('registro');
})->name('registro');

Route::get('resultados',function(){
    return view('resultados');
})->name('resultados');
Route::post('/', 'App\Http\Controllers\ProyectoController@store')->name('proyectos.store');
Route::post('home', 'App\Http\Controllers\DataController@store')->name('ofertantes.store');
Route::get('home', 'App\Http\Controllers\DataController@calculate')->name('proposal.calculate');
