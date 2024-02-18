<?php
namespace App\Http\Controllers\Api;

use App\Models\Recette;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecetteController extends Controller
{
    public function index()
    {
        return response()->json(Recette::all());
    }

    public function show(Recette $recette)
    {
        return response()->json($recette);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'Duree' => 'required|integer',
            'glucides' => 'required|numeric',
            'proteines' => 'required|numeric',
            'lipides' => 'required|numeric',
        ]);

        $recette = Recette::create($validatedData);
        return response()->json($recette, 201);
    }

    public function update(Request $request, Recette $recette)
    {
        $validatedData = $request->validate([
            'menu_id' => 'exists:menus,id',
            'nom' => 'string|max:255',
            'description' => 'nullable|string',
            'Duree' => 'integer',
            'glucides' => 'numeric',
            'proteines' => 'numeric',
            'lipides' => 'numeric',
        ]);

        $recette->update($validatedData);
        return response()->json($recette);
    }

    public function destroy($id)
    {
        $recette = Recette::find($id);

        if ($recette) {
            $recette->delete();
            return response()->json(['message' => 'recette supprimé avec succès.'], 200);
        } else {
            return response()->json(['message' => 'recette non trouvé.'], 404);
        }
    }
}

