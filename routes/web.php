<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AutomovelController;
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

  Route::get('automovel', [AutomovelController::class, 'automovel'])->name('automovel.listar');
  Route::get('automovel/salvar', [AutomovelController::class, 'formAdicionar'])->name('automovel.form');
  Route::post('automovel/salvar', [AutomovelController::class, 'adicionar'])->name('automovel.adicionar');
  Route::delete('automovel/{id}', [AutomovelController::class, 'deletar'])->name('automovel.deletar');
  Route::get('automovel/{id}', [AutomovelController::class, 'formEditar'])->name('automovel.formEditar');
  Route::put('automovel/{id}', [AutomovelController::class, 'editar'])->name('automovel.editar');
});

Route::get('sobre',function(){
    return '<h1>Sobre</h1>';
});
