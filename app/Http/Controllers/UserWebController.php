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

        return redirect()->route('user.users');
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
        $users = User::paginate(20);
        return view('user.users',compact('users'));
    }

    public function signup()
    {
        return view('user.signup');
    }
    public function createUser(Request $request)
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

        return redirect()->route('user.users', $user)->with('success', 'Usuário Cadastrado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'status' => 'required',
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'active' => $validated['status'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()->route('user.users');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(20);

        return view('user.users', compact('users'));
    }
}
