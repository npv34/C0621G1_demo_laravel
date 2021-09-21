<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index() {
        $users = [
            [
                "id" => 1,
                "name" => "Dac Chien",
                "group" => "C0621G1",
                "address" => "Ha Noi"
            ],

            [
                "id" => 2,
                "name" => "Huy Cuong",
                "group" => "C0621G1",
                "address" => "Viet Tri"
            ],
            [
                "id" => 3,
                "name" => "Quoc Cuong",
                "group" => "C0621G1",
                "address" => "Viet Tri"
            ],
        ];
        return view('users.list', compact('users'));
    }

    function detail($id) {
        echo $id;
    }

    function getComment($idUser, $idComment = 1) {

    }
}
