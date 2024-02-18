<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|boolean|in:0,1 ',
            'date_naissance' => 'date',
            'sex' => 'string',
            'poids' => 'numeric',
            'taille' => 'numeric',
            'telephone' => 'string',
            'adresse' => 'string',
            'programme_id' => 'exists:programmes,id',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);
        return response()->json($user, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8',
            'role' => 'boolean|in:0,1 ',
            'date_naissance' => 'date',
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $user->update($validatedData);
        return response()->json($user);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return response()->json(['message' => 'Utilisateur supprimé avec succès.'], 200);
        } else {
            return response()->json(['message' => 'Utilisateur non trouvé.'], 404);
        }
    }

}
