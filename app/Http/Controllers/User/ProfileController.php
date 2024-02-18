<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Programme;

class ProfileController extends Controller
{
    public function index()
    {
        $programme = Programme::all();
        return view('user/profile', compact('programme'));

    }

    public function update(User $user, Request $request)
    {   
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'prenom' => $request->prenom,
            'programme_id' => $request->programme_id,
            'date_naissance' => $request->date_naissance,
            'sex' => $request->sex,
            'poids' => $request->poids,
            'taille' => $request->taille,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'updated_at' => now()
        ]);
        return redirect()->route('home');
    }
}
