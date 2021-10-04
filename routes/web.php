<?php

use App\Http\Controllers\BorrownController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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
Route::get('', function () {
    return redirect()->route('home.index');
});
Route::get('/admin/login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('auth.login');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home.index');
    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/{id}', [UserController::class, 'detail'])->whereNumber('id')->name('users.detail');
        Route::get('/{id}/comments/{id_comment?}', [UserController::class, 'getComment'])->name('users.getComment');
        Route::get('{id}/update', [UserController::class, 'update'])->name('users.update');
        Route::post('{id}/update', [UserController::class, 'edit'])->name('users.edit');
        Route::get('{id}/delete', [UserController::class, 'delete'])->name('users.delete');
        Route::get('search', [UserController::class, 'search'])->name('users.search');
    });

    Route::prefix('borrows')->group(function () {
        Route::get('/create', [BorrownController::class, 'create'])->name('borrows.create');
        Route::get('/search-student', [BorrownController::class, 'searchStudent']);
        Route::get('/find-student/{idStudent}', [BorrownController::class, 'findStudent']);
    });


});

