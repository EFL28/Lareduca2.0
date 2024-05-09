<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Assignment;
use App\Models\AssignmentSubmission;

class AssignmentSubmissions extends Component
{
    use WithFileUploads;

    public $assignment;
    public $submissions;
    public $submission_text, $submission_file;


    public function mount($id)
    {
        $this->assignment = Assignment::find($id);
        $this->submissions = $this->assignment->submissions;

        $submission = $this->assignment->submissions->where('user_id', Auth::user()->id)->first();
        if ($submission) {
            $this->submission_text = $submission->submission_text;
        }
    }

    public function render()
    {
        return view('livewire.assignment-submissions');
    }

    public function saveSubmission()
    {
        $this->validate([
            'submission_text' => 'required|string',
            'submission_file' => 'required|file|max:10240', // 10MB Max
        ]);
        $submission = new AssignmentSubmission();

        $submission->assignment_id = $this->assignment->id;
        $submission->user_id = Auth::id(); // Asumiendo que el usuario está autenticado
        $submission->submission_text = $this->submission_text;
        if ($this->submission_file) {
            $filePath = $this->submission_file->store('submissions', 'public');
            $submission->submission_file = $filePath;
        }

        $submission->save();
        $this->reset(['submission_text', 'submission_file']); // Limpiar campos
        $this->loadSubmissions(); // Recargar entregas
    }

    public function loadSubmissions()
    {
        $this->submissions = $this->assignment->submissions;
        return redirect()->to('/assignments/management');
    }

    public function updateSubmission()
{
    // Validar los datos de entrada
    $this->validate([
        'submission_text' => 'required',
        'submission_file' => 'file|max:10240', // puedes agregar más reglas de validación aquí si es necesario
    ]);

    // Obtener la entrega del estudiante
    $submission = $this->assignment->submissions->where('user_id', Auth::user()->id)->first();

    // Actualizar el texto de la entrega
    $submission->submission_text = $this->submission_text;

    // Si se subió un nuevo archivo, eliminar el antiguo y guardar el nuevo
    if ($this->submission_file) {
        Storage::delete('public/'.$submission->submission_file);
        $submission->submission_file = $this->submission_file->store('submissions', 'public');
    }

    // Guardar los cambios en la base de datos
    $submission->save();

    // Resetear los datos de entrada y mostrar un mensaje de éxito
    $this->reset(['submission_text', 'submission_file']);
    session()->flash('message', 'Submission updated successfully.');
}

    // public function download($path)
    // {
    //     return response()->download(storage_path('app/public/' . $path));
    // }

    // public function delete($id)
    // {
    //     $submission = AssignmentSubmissions::find($id);
    //     $submission->delete();
    //     $this->submissions = $this->assignment->submissions;
    // }

    // public function grade($id, $grade)
    // {
    //     $submission = AssignmentSubmissions::find($id);
    //     $submission->grade = $grade;
    //     $submission->save();
    // }

    // public function toggleVisibility($id)
    // {
    //     $submission = AssignmentSubmissions::find($id);
    //     $submission->visible = !$submission->visible;
    //     $submission->save();
    // }

    // public function toggleFeedback($id)
    // {
    //     $submission = AssignmentSubmissions::find($id);
    //     $submission->feedback_visible = !$submission->feedback_visible;
    //     $submission->save();
    // }

    // public function toggleGrade($id)
    // {
    //     $submission = AssignmentSubmissions::find($id);
    //     $submission->grade_visible = !$submission->grade_visible;
    //     $submission->save();
    // }

    // public function toggleGradeFeedback($id)
    // {
    //     $submission = AssignmentSubmissions::find($id);
    //     $submission->grade_feedback_visible = !$submission->grade_feedback_visible;
    //     $submission->save();
    // }
}
