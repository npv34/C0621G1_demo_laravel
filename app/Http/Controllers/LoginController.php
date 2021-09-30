<?php

namespace App\Http\Controllers;

use App\Http\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    function showFormLogin(Request $request)
    {
        $email = '';
        $password = '';
        if ($request->cookie('email')){
            $email = $request->cookie('email');
            $password = $request->cookie('password');
        }
        return view('login', compact('email', 'password'));
    }

    function login(Request $request)
    {
       if ($this->loginService->checkLogin($request)) {
           Session::flash('message', 'Login succsess');
           $cookie = cookie('email', $request->email);
           $cookiePassword = cookie('password', $request->password);
           return redirect()->route('home.index')->cookie($cookie)->cookie($cookiePassword);
       } else {
           Session::flash('login-error', 'Account not exist!');
       }

       return back();
    }
}
