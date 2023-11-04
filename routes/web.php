<?php


use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/myprofile', [App\Http\Controllers\HomeController::class, 'profile'])->name('user.profile');
Route::get('/product/all_products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/product/save', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
Route::get('/product/{id}/detail', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::get('/fetchWeight',[App\Http\Controllers\ProductController::class, 'fetchWeight']);
Route::get('/fetchPrice',[App\Http\Controllers\ProductController::class, 'fetchPrice']);






Route::get('/fallback', [App\Http\Controllers\HomeController::class, 'fallback'])->name('fallback');
