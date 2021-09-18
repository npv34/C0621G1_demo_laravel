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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});


Route::post('/login', function (\Illuminate\Http\Request $request) {
   $email = $request->email;
   $password = $request->password;

   if ($email == "admin@gmail.com" && $password == "1234") {
       return redirect('home');
   } else {
       session()->flash('login_error', 'Tai khoan sai');
       return redirect('login');
   }
});
