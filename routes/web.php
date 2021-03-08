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



//se crea la vista home, registro y resultados
Route::get('home',function(){
    return view('home');
 })->name('home');
 
 Route::get('/',function(){
    return view('registro');
})->name('registro');

Route::get('resultados',function(){
    return view('resultados');
})->name('resultados');

Route::get('vae',function(){
    return view('vae');
})->name('vae');

//se define una ruta tipo post para usar el controlador del formulario enviado en la vista registro y home respecticamente
Route::post('registro', 'App\Http\Controllers\ProyectoController@store')->name('proyectos.store');
Route::post('home', 'App\Http\Controllers\DataController@store')->name('ofertantes.store');
Route::post('vae', 'App\Http\Controllers\DataController@update')->name('vae.update');
