<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;


class CourseEnrollment extends Component
{
    private $courses, $enrollments;

    public function mount()
    {
        $this->enrollments = CourseEnrollment::all();
        //dd($this->enrollments);
        //dd($this->courses);
    }

    public function render()
    {
        
        return view('livewire.course-enrollment', ['enrollments' => $this->enrollments]);
    }
    
}
