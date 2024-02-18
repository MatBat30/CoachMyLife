<?php

use App\Http\Controllers\Api\ExerciceController;
use App\Http\Controllers\Api\ProgrammeController;
use App\Http\Controllers\Api\RecetteController;
use App\Http\Controllers\Api\SessionExerciceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\TacheQuotidienneController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('programmes', ProgrammeController::class);
Route::apiResource('session-exercises', SessionExerciceController::class);
Route::apiResource('exercices', ExerciceController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('menus', MenuController::class);
Route::apiResource('recettes', RecetteController::class);
Route::apiResource('tache-quotidiennes', TacheQuotidienneController::class);


