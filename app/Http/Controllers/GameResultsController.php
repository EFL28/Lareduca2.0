<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameSession;
use App\Models\GameScore;
use Carbon\Carbon;

class GameResultsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'game_id' => 'required|integer',
            'score' => 'required|integer',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        // Verificar si ya existe una sesión de juego para el mismo usuario y juego
        $existingSession = GameSession::where('user_id', $validated['user_id'])
                                       ->where('game_id', $validated['game_id'])
                                       ->first();

        if ($existingSession) {
            // Si existe una sesión, actualiza la información de la sesión existente
            $existingSession->update([
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time']
            ]);

            // También actualiza el puntaje del juego asociado a esa sesión
            $existingSession->gameScore()->update(['score' => $validated['score']]);

            return response()->json(['message' => 'Game results updated successfully']);
        } else {
            // Si no existe una sesión, crea una nueva sesión de juego y almacena el resultado
            $gameSession = GameSession::create([
                'user_id' => $validated['user_id'],
                'game_id' => $validated['game_id'],
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time']
            ]);
            
            // Crea un nuevo registro de puntaje de juego asociado a esa sesión
            $gameScore = GameScore::create([
                'session_id' => $gameSession->id,
                'score' => $validated['score'],
            ]);

            return response()->json(['message' => 'Game results stored successfully']);
        }
    }
}
