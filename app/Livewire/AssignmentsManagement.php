<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Assignment;
use App\Models\Course;


class AssignmentsManagement extends Component
{
    public $assignments, $title, $description, $assignment_id, $due_date, $courses, $course_id;
    public $isModalOpen = false;

    public function mount()
    {
        $this->courses = Course::all();
        $this->assignments = Assignment::all();
    }


    public function render()
    {
        $this->assignments = Assignment::all();
        return view('livewire.assignments-management');
    }

    public function delete($id)
    {
        Assignment::find($id)->delete();
        session()->flash('message', 'Assignment deleted.');
    }

    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $this->assignment_id = $id;
        $this->title = $assignment->title;
        $this->description = $assignment->description;
        $this->due_date = $assignment->due_date;
        $this->openModalPopover();
    }

    public function store()
    {
        //dd($this->title, $this->description, $this->teacher_id);
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            
            'due_date' => 'required',

        ]);

        Assignment::updateOrCreate(['id' => $this->assignment_id], [
            'title' => $this->title,
            'description' => $this->description,
            
            'due_date' => $this->due_date,
        ]);

        session()->flash('message', $this->assignment_id ? 'Assignment updated.' : 'Assignment created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
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

    private function resetCreateForm()
    {
        $this->title = '';
        $this->description = '';
    }
}
