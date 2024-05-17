<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;




class CourseEnrollment extends Component
{
    public $courses;
    public $selectedCourseId;
    public $enrollments;

    public function mount()
    {
        $this->courses = Course::all();
        $this->loadEnrollments();
    }

    public function loadEnrollments()
    {
        // if (Auth::user()->hasRole('teacher') || Auth::user()->hasRole('admin')) {
        //     $this->enrollments = CourseEnrollment::with('user')->get();
        // }

        // si el usuario logueado es un estudiante solo se le mostraran sus cursos

        $this->enrollments = \App\Models\CourseEnrollment::where('user_id', Auth::id())->with('course')->get();
    }

    public function enroll()
    {
        $this->validate([
            'selectedCourseId' => 'required',
        ]);
        CourseEnrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $this->selectedCourseId,
            'enrollment_date' => now(),
            'status' => 'enrolled', // Considerar distintos estados
        ]);
        session()->flash('message', 'Successfully enrolled in the course.');
    }
    public function render()
    {
        return view('livewire.course-enrollment');
    }
}
