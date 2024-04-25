<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    // Si permites envíos de asignaciones
    public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class);
    }
}
