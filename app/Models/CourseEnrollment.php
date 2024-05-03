<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEnrollment extends Model
{
    //use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'course_id',
        'enrollment_date',
        'status'
    ];
}
