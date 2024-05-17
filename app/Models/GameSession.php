<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameSession extends Model
{
    //use HasFactory;
    protected $fillable = [
        'id',
        'game_id',
        'user_id',
        // 'score',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
    ];

    public function gameScore()
    {
        return $this->hasOne(GameScore::class, 'session_id');
    }
}
