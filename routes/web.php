<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    // return view('test', ['nama' => 'Dimas Cahyo', 'umur' => 18]);
    return view('test')->with('nama', 'Dimas Cahyo')->with('umur', 18);
});

Route::get('/admin', [DashboardController::class, 'index']);
Route::get('/admin/category/create', [CategoryController::class, 'create']);
Route::post('/admin/category', [CategoryController::class, 'store']);
Route::get('/admin/category', [CategoryController::class, 'index']);
Route::get('/admin/category/{category}', [CategoryController::class, 'show']);
Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit']);
Route::put('/admin/category/{category}', [CategoryController::class, 'update']);
Route::delete('/admin/category/{category}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::resource('admin/product', ProductController::class);

Route::get('/admin/transaction', [TransactionController::class, 'index'])->name('transaction.index');
Route::get('/admin/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::post('/admin/transaction', [TransactionController::class, 'import'])->name('transaction.import');