<?php

namespace App\Http\Controllers;

use App\Http\Services\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    function showFormLogin()
    {
        return view('login');
    }

    function login(Request $request)
    {
       if ($this->loginService->checkLogin($request)) {
           return redirect()->route('home.index');
       }

       return back();
    }
}
