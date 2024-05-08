<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Assignment;


class AssignmentSubmissions extends Component
{
    public $assignment;
    public $submissions;

    public function mount($id)
    {
        $this->assignment = Assignment::find($id);
        $this->submissions = $this->assignment->submissions;
    }

    public function render()
    {
        return view('livewire.assignment-submissions');
    }

    public function download($path)
    {
        return response()->download(storage_path('app/public/' . $path));
    }

    public function delete($id)
    {
        $submission = AssignmentSubmissions::find($id);
        $submission->delete();
        $this->submissions = $this->assignment->submissions;
    }

    public function grade($id, $grade)
    {
        $submission = AssignmentSubmissions::find($id);
        $submission->grade = $grade;
        $submission->save();
    }

    public function toggleVisibility($id)
    {
        $submission = AssignmentSubmissions::find($id);
        $submission->visible = !$submission->visible;
        $submission->save();
    }

    public function toggleFeedback($id)
    {
        $submission = AssignmentSubmissions::find($id);
        $submission->feedback_visible = !$submission->feedback_visible;
        $submission->save();
    }

    public function toggleGrade($id)
    {
        $submission = AssignmentSubmissions::find($id);
        $submission->grade_visible = !$submission->grade_visible;
        $submission->save();
    }

    public function toggleGradeFeedback($id)
    {
        $submission = AssignmentSubmissions::find($id);
        $submission->grade_feedback_visible = !$submission->grade_feedback_visible;
        $submission->save();
    }
}
