<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\GameScore;
use App\Models\EducationalGame;
use App\Models\GameSession;
use Livewire\Component;

class EducationalGamesIntegration extends Component
{
    public $games, $selectedGameId;

    public function mount()
    {
        $this->games = EducationalGame::all();
    }

    public function startGameSession($gameId)
    {
        $session = GameSession::create([
            'game_id' => $gameId,
            'user_id' => auth()->id(),
            'score' => 0,
        ]);

        $this->selectedGameId = $gameId;
        // Aquí puedes establecer lógica adicional para manejar la sesión de juego
    }

    public function endGameSession($gameId, $score)
    {
        // Asumiendo que la sesión de juego se identifica de alguna manera.
        // Aquí podrías buscar la sesión abierta para este juego y usuario y cerrarla.
        $session = GameSession::where('game_id', $gameId)
            ->where('user_id', Auth::id())
            ->latest()
            ->first();
        if ($session) {
            $session->end_time = now();
            $session->save();
            GameScore::create([
                'session_id' => $session->id,
                'score' => $score,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.educational-games-integration', [
            'games' => $this->games,
            'selectedGameId' => $this->selectedGameId,
        ]);
    }
}
