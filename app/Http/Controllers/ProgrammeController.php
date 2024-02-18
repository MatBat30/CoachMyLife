<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Http\Requests\StoreProgrammeRequest;
use App\Http\Requests\UpdateProgrammeRequest;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgrammeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programme $programme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgrammeRequest $request, Programme $programme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programme $programme)
    {
        //
    }

    public function assignerProgramme(Request $request, $userId)
    {
        $programmeId = $request->input('programme_id');
        $user = User::find($userId);
        $user->programme_id = $programmeId;
        $user->save();

        // Sélectionner 7 sessions aléatoires parmi les 28
        $sessionsIds = SessionExercice::inRandomOrder()->take(7)->pluck('id');

        // Attribuer ces sessions au programme de l'utilisateur
        foreach ($sessionsIds as $sessionId) {
            DB::table('programme_session')->insert([
                'programme_id' => $programmeId,
                'session_exercice_id' => $sessionId,
            ]);

            // Sélectionner aléatoirement 5 exercices pour chaque session
            $exercicesIds = Exercice::inRandomOrder()->take(5)->pluck('id');

            // Attribuer les exercices à la session
            foreach ($exercicesIds as $exerciceId) {
                DB::table('session_exercice_exercice')->insert([
                    'session_exercice_id' => $sessionId,
                    'exercice_id' => $exerciceId,
                ]);
            }
        }

        return response()->json(['message' => 'Programme et sessions avec exercices attribués avec succès.']);
    }
}
