<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */


//Show all Shops
Route::get('',[ShopController::class, 'show'])->name('shopsHome');

//Create Shop
Route::get('/create',[ShopController::class, 'create'])->name('shopsCreate');
Route::post('/create', [ShopController::class, 'store'])->name('shopsStore');

//Edit Shop
Route::get('/{slug}', [ShopController::class, 'edit'])->name('shopsEdit');
Route::post('/{id}', [ShopController::class, 'update'])->name('shopsUpdate');

//Delete Shop
Route::delete('/{slug}', [ShopController::class, 'destroy'])->name('shopsDestroy');