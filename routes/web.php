<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AutomovelController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\ConcessionariaController;
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


Route::redirect('/', '/admin/automovel');
//Route::get('/', function () {
  //  return view('welcome');
//});


Route::prefix('admin')->name('admin.')->group(function(){

    Route::resource('automovel', AutomovelController::class);
    Route::resource('automovel', AutomovelController::class)->except(['show']);
    Route::resource('concessionaria', ConcessionariaController::class);
    Route::resource('concessionaria.fotos', FotoController::class)->except(['show','edit','update']);
      
});

Route::get('sobre',function(){
    return '<h1>Sobre</h1>';
});
