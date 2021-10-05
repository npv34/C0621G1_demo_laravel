<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class UserController extends Controller implements BaseInterface, UserInterface
{
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    function index()
    {
        $users = User::all();
        return view('users.list', compact('users'));

    }

    function detail($id)
    {
        echo $id;
    }

    function getComment($idUser, $idComment = 1)
    {

    }

    function create()
    {
        if (Gate::allows('user-crud')) {
            $roles = Role::all();
            return \view('users.add', compact('roles'));
        } else {
            abort(403);
        }

    }

    function delete($id)
    {
        if (Gate::allows('user-crud')) {
            $user = User::findOrFail($id);
            $user->roles()->detach();
            $user->delete();
            return response()->json(['message' => 'Delete successfully']);
        } else {
            abort(403);
        }

    }

    function getPostOfUser($idUser)
    {
        // TODO: Implement getPostOfUser() method.
    }

    function store(CreateUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->roles()->sync($request->role);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
        }
        return redirect()->route('users.index');

    }

    function update($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return \view('users.update', compact('user', 'roles'));
    }

    function edit(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            $user->roles()->sync($request->role);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->route('users.index');
    }

    function search(Request $request) {
        $keyword = $request->keyword;
        $users = User::where('name', 'LIKE', '%' . $keyword . '%')->get();
        return response()->json($users);
    }
}
