<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseForm extends Component
{
    public $title, $description, $course_id, $teacher_id;

    public function render()
    {
        return view('livewire.course-form');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'teacher_id' => 'required',
        ]);
        Course::updateOrCreate(['id' => $this->course_id], [
            'title' => $this->title,
            'description' => $this->description,
            'teacher_id' => $this->teacher_id,
        ]);
        session()->flash('message', $this->course_id ? 'Course updated.'
            : 'Course created.');
        //$this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $this->course_id = $id;
        $this->title = $course->title;
        $this->description = $course->description;
        $this->openModalPopover();
    }

    private function resetCreateForm()
    {
        $this->title = '';
        $this->description = '';
        $this->course_id = '';
    }
}
