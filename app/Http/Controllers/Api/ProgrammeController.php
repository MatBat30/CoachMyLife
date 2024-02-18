<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programme;


class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::all();
        return response()->json($programmes);
    }

    public function show(Programme $programme)
    {
        return response()->json($programme);
    }
    public function store(Request $request)
    {
        $programme = Programme::create($request->all());
        return response()->json($programme, 201);
    }

    public function update(Request $request, Programme $programme)
    {
        $programme->update($request->all());
        return response()->json($programme);
    }

    public function destroy($id)
    {
        $programme = Programme::find($id);

        if ($programme) {
            $programme->delete();
            return response()->json(['message' => 'programme supprimé avec succès.'], 200);
        } else {
            return response()->json(['message' => 'programme non trouvé.'], 404);
        }
    }

}
