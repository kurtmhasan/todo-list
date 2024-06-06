<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function (){
    return view('adminPanel.index');
})->name('index');

Route::get('/index',function (){
    return view('adminPanel.index');
})->name('index');
Route::get('/modalEdit',function (){
    return view('adminPanel.modalEdit');
})->name('modalEdit');


Route::get('/edit/{id}', [TaskController::class,'edit'])->name('edit');
Route::get('/form', [TaskController::class,'form'])->name('form');

route::get('/kategoriGetir',[TaskController::class,'kategoriGetir']) -> name('kategoriGetir');
route::get('/data',[TaskController::class,'data']) -> name('data');
route::get('/sil/{id}',[TaskController::class,'sil']) -> name('sil');
route::get('/sil2/{id}',[TaskController::class,'sil2']) -> name('sil2');
route::post('/kaydet',[TaskController::class,'kaydet']) -> name('kaydet');
route::post('/kaydet2',[FormController::class,'kaydet2']) -> name('kaydet2');
route::get('/guncelle/{id}',[TaskController::class,'guncelle']) -> name('guncelle');
route::get('/guncelle2/{id}',[TaskController::class,'guncelle2']) -> name('guncelle2');
route::get('/kategoriGoster',[FormController::class,'kategoriGoster']) -> name('kategoriGoster');
route::post('/filtrele',[TaskController::class,'filtrele']) -> name('filtrele');


Route::get('/data2', [TaskController::class, 'getData'])->name('getData');
Route::get('/getShowKategori', [TaskController::class, 'getShowKategori'])->name('getShowKategori');









