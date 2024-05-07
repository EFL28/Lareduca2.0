<?php

namespace App\Livewire;

use App\Models\Assignment;
use Livewire\Component;
use App\Models\Course;

class AssignmentForm extends Component
{

    public $title, $description, $assignment_id, $course_id, $courses, $due_date;

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function render()
    {
        return view('livewire.assignment-form');
    }


    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'course_id' => 'required',
            'due_date' => 'required'
        ]);
        Assignment::create([
            'id' => $this->assignment_id,
            'title' => $this->title,
            'description' => $this->description,
            'course_id' => $this->course_id,
            'due_date' => $this->due_date
        ]);
        session()->flash('message', $this->assignment_id ? 'Assignment updated.'
            : 'Assignment created.');
        //$this->closeModalPopover();
        $this->resetCreateForm();
        return redirect()->to('/assignments/management');
    }

    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $this->assignment_id = $id;
        $this->title = $assignment->title;
        $this->description = $assignment->description;
        $this->course_id = $assignment->course_id;
        $this->due_date = $assignment->due_date;
        $this->openModalPopover();
    }

    private function resetCreateForm()
    {
        $this->title = '';
        $this->description = '';
        $this->course_id = '';
        $this->due_date = '';
    }
}
