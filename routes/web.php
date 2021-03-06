<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnitController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix' => 'roles'], function(){
    Route::group(['middleware' => ['auth']], function() {

      Route::get('create', [RoleController::class, 'create'])->name('role.create');
      Route::post('store', [RoleController::class, 'store'])->name('role.store');
      Route::get('edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
      Route::post('update/{role}', [RoleController::class, 'update'])->name('role.update');
      Route::post('delete/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
      });
      Route::get('show/{role}', [RoleController::class, 'show'])->name('role.show');
      Route::get('', [RoleController::class, 'index'])->name('role.index');

});


Route::group(['prefix' => 'units'], function(){
   Route::group(['middleware' => ['auth']], function() { 
      Route::get('specifics', [UnitController::class, 'indexSpecifics'])->name('unit.indexSpecifics');
      Route::get('create', [UnitController::class, 'create'])->name('unit.create');
      Route::post('store', [UnitController::class, 'store'])->name('unit.store');
      Route::get('edit/{unit}', [UnitController::class, 'edit'])->name('unit.edit');
      Route::post('update/{unit}', [UnitController::class, 'update'])->name('unit.update');
      Route::post('delete/{unit}', [UnitController::class, 'destroy'])->name('unit.destroy');
      Route::post('uploadPhoto/{unit}', [UnitController::class, 'uploadPhoto'])->name('unit.uploadPhoto');
   } );
      Route::get('', [UnitController::class, 'index'])->name('unit.index');
      Route::get('show/{unit}', [UnitController::class, 'show'])->name('unit.show');

});
