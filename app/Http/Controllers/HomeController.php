<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller implements BaseInterface
{
    function index() {
        return view('welcome');
    }

    function create()
    {
        // TODO: Implement create() method.
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
