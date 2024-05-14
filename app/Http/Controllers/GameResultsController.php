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
            'attempts' => 'required|integer',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);
        // Calcula la diferencia en minutos usando Carbon
        $duration = Carbon::parse($validated['start_time'])->diffInMinutes($validated['end_time']);
        // Inicia la nota en 10 y ajusta según los intentos y la duración
        $score = max(10 - ($validated['attempts'] * 0.5) - ($duration *
            0.1), 0);
        // Crea una nueva sesión de juego y almacena el resultado
        $gameSession = GameSession::create([
            'user_id' => $validated['user_id'],
            'game_id' => $validated['game_id'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time']
        ]);
        $gameScore = GameScore::create([
            'session_id' => $gameSession->id,
            'score' => $score,
        ]);
        return response()->json(['message' => 'Game results stored successfully', 'score' => $score]);
    }
}
