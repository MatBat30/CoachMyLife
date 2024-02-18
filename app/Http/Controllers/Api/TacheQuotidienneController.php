<?php
namespace App\Http\Controllers\Api;

use App\Models\TacheQuotidienne;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TacheQuotidienneController extends Controller
{
    public function index()
    {
        return response()->json(TacheQuotidienne::all());
    }

    public function show(TacheQuotidienne $tacheQuotidienne)
    {
        return response()->json($tacheQuotidienne);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nom' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $tache = TacheQuotidienne::create($validatedData);
        return response()->json($tache, 201);
    }

    public function update(Request $request, TacheQuotidienne $tacheQuotidienne)
    {
        $validatedData = $request->validate([
            'user_id' => 'exists:users,id',
            'nom' => 'string|max:255',
            'status' => 'boolean',
        ]);

        $tacheQuotidienne->update($validatedData);
        return response()->json($tacheQuotidienne);
    }


    public function destroy($id)
    {
        $tacheQuotidienne = TacheQuotidienne::find($id);

        if ($tacheQuotidienne) {
            $tacheQuotidienne->delete();
            return response()->json(['message' => 'tacheQuotidienne supprimé avec succès.'], 200);
        } else {
            return response()->json(['message' => 'tacheQuotidienne non trouvé.'], 404);
        }
    }
}
