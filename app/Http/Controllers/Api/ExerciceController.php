<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciceResource;
use Illuminate\Http\Request;
use App\Models\Exercice;
use function Symfony\Component\Translation\t;


class ExerciceController extends Controller
{

    public function index()
    {
        $exercices = Exercice::all();
        return response()->json($exercices);
    }

    public function show(Exercice $exercice)
    {
        return response()->json($exercice);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'Duree' => 'required|integer',
        ]);

        $exercice = Exercice::create($validatedData);
        return response()->json($exercice, 201);
    }

    public function update(Request $request, Exercice $exercice)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'Duree' => 'required|integer',
        ]);

        $exercice->update($validatedData);
        return response()->json($exercice);
    }

    public function destroy($id)
    {
        $exercice = Exercice::find($id);

        if ($exercice) {
            $exercice->delete();
            return response()->json(['message' => 'exercice supprimé avec succès.'], 200);
        } else {
            return response()->json(['message' => 'exercice non trouvé.'], 404);
        }
    }





}
