<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function showFormLogin() {
        return view('login');
    }

    function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        if ($email == "admin@gmail.com" && $password == "1234") {
            return redirect('home');
        } else {
            session()->flash('login_error', 'Tai khoan sai');
            return redirect()->route('login.showFormLogin');
        }
    }
}
