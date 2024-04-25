<?php

namespace App\Livewire;

use Livewire\Component;

class CourseForm extends Component
{
    public function render()
    {
        return view('livewire.course-form');
    }

    public function mount()
    {
        $this->listeners = ['openCourseForm' => 'openForm'];
    }

    public function openForm()
    {
        $this->emit('openModal', 'course-form');
    }
}
