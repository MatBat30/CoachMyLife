<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return response()->json($menus);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'programme_id' => 'required|exists:programmes,id',
            'name' => 'required|string|max:255',
        ]);

        $menu = Menu::create($validatedData);
        return response()->json($menu, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return response()->json($menu);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'programme_id' => 'exists:programmes,id',
            'name' => 'string|max:255',
        ]);

        $menu->update($validatedData);
        return response()->json($menu);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);

        if ($menu) {
            $menu->delete();
            return response()->json(['message' => 'menu supprimé avec succès.'], 200);
        } else {
            return response()->json(['message' => 'menu non trouvé.'], 404);
        }
    }

}
