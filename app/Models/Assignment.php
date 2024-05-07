<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

    protected $fillable = [
        'id',
        'title',
        'description',
        'course_id',
        'due_date'
    ];

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
