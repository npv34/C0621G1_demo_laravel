<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller implements BaseInterface, UserInterface
{
    private $userModel;
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

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
        $message = "xin chao";
        if (View::exists('users.list')) {
            return view('users.list', compact('users','message'));
        } else {
            dd("loi");
        }
    }

    function detail($id) {
        echo $id;
    }

    function getComment($idUser, $idComment = 1) {

    }

    function create()
    {
        return \view('users.add');
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }

    function getPostOfUser($idUser)
    {
        // TODO: Implement getPostOfUser() method.
    }
}
