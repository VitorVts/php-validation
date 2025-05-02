<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserWebController extends Controller
{
    public function destroyUser(User $user)
    {
        $user->delete();
        return 'Usuário deletado';
    }

    public function getUser(User $user)
    {
//        $user = User::find($id);
//        if (!$user)
//            {
//                return 'Usuáro não encontrado';
//            }
//        return view('welcome',compact('user'));
        return view('welcome',compact('user'));
    }

    public function getAllUsers(): object
    {
        $users = User::all();
        return view('welcome',compact('users'));
    }

    public function createUser(Request $request): void
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

       $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        dd($user);
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);
        dd($user);
    }
}
