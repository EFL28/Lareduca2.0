<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\CourseEnrollment;
use Illuminate\Support\Facades\Auth;

class CourseManagement extends Component
{
    public $courses, $title, $description, $teacher_id, $course_id;
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

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $this->course_id = $id;
        $this->title = $course->title;
        $this->description = $course->description;
        $this->teacher_id = $course->teacher_id;
        $this->openModalPopover();
    }

    public function store()
    {
        //dd($this->title, $this->description, $this->teacher_id);
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
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    private function resetCreateForm()
    {
        $this->title = '';
        $this->description = '';
        $this->teacher_id = '';
    }

    public function enroll($id)
    {
        $user_id = Auth::user()->id; // Obtiene el ID del usuario logueado

        // Crea una nueva inscripción
        $enrollment = new CourseEnrollment;
        $enrollment->user_id = $user_id;
        $enrollment->course_id = $id;
        $enrollment->enrollment_date = now();
        $enrollment->status = 'subscribed';
        $enrollment->save();

        // Actualiza la lista de cursos para reflejar el cambio
        $this->courses = Course::all();
    }
}
