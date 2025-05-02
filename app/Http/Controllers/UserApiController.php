<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UserApiController extends Controller
{
    public function createUser(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        return response()->json([
            'mensagem' => 'Usuário criado com sucesso.',
            'user' => $user
        ], 201);
    }
    public function getUser($id): JsonResponse
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json("Usuário não encontrado.", 404);
        }
        return response()->json($user->toArray());
    }

    public function getUsers(): JsonResponse
    {
        $users = User::all();
        return response()->json($users->toArray());
    }

    public function destroyUser(User $user): JsonResponse
    {
        $user->delete();
        return response()->json(['mensagem' => 'Usuário deletado com sucesso.']);
    }

    public function updateUser(Request $request, User $user): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required|string|min:6'
        ]);

        $user = $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);
        return response()->json([
            'mensagem' => 'Usuário Atualizado com sucesso',
            'user' => $user
        ]);
    }

}
