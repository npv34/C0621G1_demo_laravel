<?php

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

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/admin/login', [LoginController::class, 'showFormLogin'])->name('login.showFormLogin');
Route::post('/login', [LoginController::class,'login'])->name('login');

Route::middleware('isLogin')->prefix('admin')->group(function () {

    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->middleware('isAdmin')->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->middleware('isAdmin')->name('users.store');
        Route::get('/{id}', [UserController::class, 'detail'])->whereNumber('id')->name('users.detail');
        Route::get('/{id}/comments/{id_comment?}', [UserController::class, 'getComment'])->name('users.getComment');
    });

    Route::prefix('posts')->group(function () {

    });
});






/*
 * Route::method('uri', 'action')
 *
 * - method: GET - lấy tài nguyên
 *           POST - them moi
 *           PUT - cap nhat
 *           DELETE - Xoa
 *
 * - action: - function x
 *           - array [Controller::class, 'method'] -> nen su dung
 *           - string - 'App\Http\Controllers@method' x
 *
 */
