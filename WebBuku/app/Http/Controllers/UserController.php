<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $User = User::all();
        return view('user.index', compact('User'));

        return view(view: 'User.index');
    }
    public function AddUser(){
        return view(view: 'User.AddUser');
    }
    public function AddUserAction(Request $request)
    {
        DB::table('Users')->insert([
            'name'=> $request->NamaUser,
            'email'=> $request->Email,
            'password'=>  Hash::make($request->Password),
        ]);
        return redirect()->route('index.User');
    }

    public function EditUser(User $id){
        return view('user.EditUser', compact('id'));
    }

    public function EditUserAction(Request $request, string $id)
    {
        DB::table('users')->where('id', $id)->update([
            'name'=> $request->NamaUser,
            'email'=> $request->Email,
            'password'=>  Hash::make($request->Password),
        ]);
        return redirect()->route('index.User');
    }

    public function DeleteUserAction(User $id)
    {
        $id->delete();
        return redirect()->route('index.User');
    }
    
}

