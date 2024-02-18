<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recette;
use Illuminate\Http\Request;
use App\Models\SessionExercice;

class SessionExerciceController extends Controller
{
    public function index()
    {
        $sessions = SessionExercice::all();
        return response()->json($sessions);
    }

    public function show(SessionExercice $sessionExercice)
    {
        return response()->json($sessionExercice);
    }

    public function store(Request $request)
    {
        $sessionExercice = SessionExercice::create($request->all());
        return response()->json($sessionExercice, 201);
    }

    public function update(Request $request, SessionExercice $sessionExercice)
    {
        $sessionExercice->update($request->all());
        return response()->json($sessionExercice);
    }

    public function destroy($id)
    {
        $sessions = SessionExercice::find($id);

        if ($sessions) {
            $sessions->delete();
            return response()->json(['message' => 'sessions supprimé avec succès.'], 200);
        } else {
            return response()->json(['message' => 'sessions non trouvé.'], 404);
        }
    }

}
