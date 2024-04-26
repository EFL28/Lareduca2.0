<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseManagement extends Component
{
    public $courses;
    public $isModalOpen = false;

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function render()
    {
        $this->courses = Course::all();
        return view('livewire.course-management');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    public function delete($id)
    {
        Course::find($id)->delete();
        session()->flash('message', 'Course deleted.');
    }

    public function redirectToForm()
    {

    }
}
