<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ $assignment->course->title }} -
                Assignment: {{ $assignment->title }}
            </h2>

            <h3>
                {{ $assignment->description }}
            </h3>

        </div>
    </x-slot>



    @if (Auth::user()->role != 'student')
    <!-- Listado de estudiantes y su entrega de la tarea (vista profesores y admins) -->
    <div>
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Student</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Submission Date</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Submission File</th>
                        <!-- <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Grade</th> -->
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                    </tr>
                </thead>
                @foreach ($assignment->submissions as $submission)
                <tbody>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $submission->user->name}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $submission->submitted_at }}</td>
                        <td class="py-4 px-6 border-b border-grey-light"><a class="font-bold" href="{{ Storage::url($submission->submission_file) }}" target="_blank">Ver entrega</a></td>
                        <!-- <td class="py-4 px-6 border-b border-grey-light">{{ $submission->grade }}</td> -->
                        <td class="py-4 px-6 border-b border-grey-light">
                            <button wire:click="grade({{ $submission->id }})" class="bg-blue-400 rounded-lg p-2 font-semibold text-white">Grade</button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @elseif ($assignment->submissions->where('user_id', Auth::user()->id)->count() <= 0) <!-- Si el estudiante no ha entregado la tarea -->
        <!-- Formulario para enviar la entrega de la tarea -->
        <div class="bg-white shadow-md rounded m-6">
            <form wire:submit.prevent="saveSubmission">
                <div class="flex flex-col p-4">
                    <label for="submission_text" class="block text-gray-700 text-lg font-bold mb-2">Submission text:</label>
                    <textarea wire:model="submission_text" class="resize-none shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    @error('submission_text') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="flex flex-col p-4">
                    <label for="submission_file" class="text-lg font-semibold">Submission File</label>
                    <input type="file" wire:model="submission_file" class="border border-gray-400 p-2 rounded-lg">
                    @error('submission_file') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-center p-4">
                    <button type="submit" class="bg-blue-400 rounded-lg p-2 font-semibold text-white">Submit</button>
                </div>
            </form>
        </div>
        @else <!-- Si el estudiante ya entregó la tarea, se muestra su tarea entregada -->
        <div class="bg-white shadow-md rounded m-6">
            <form wire:submit.prevent="updateSubmission">
                <div class="flex flex-col p-4">
                    <label for="description" class="block text-gray-700 text-lg font-bold mb-2">Submission text:</label>
                    <textarea wire:model="submission_text" class="resize-none shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $assignment->submissions->where('user_id', Auth::user()->id)->first()->submission_text }}</textarea>
                </div>
                <div class="flex flex-col p-4">
                    <label for="submission_file" class="text-lg font-semibold">Submission File</label>
                    <input type="file" wire:model="submission_file" class="border border-gray-400 p-2 rounded-lg">
                    @if ($assignment->submissions->where('user_id', Auth::user()->id)->first()->submission_file)
                    <span class="text-gray-500">Current file: {{ $assignment->submissions->where('user_id', Auth::user()->id)->first()->submission_file }}</span>
                    @endif
                    @error('submission_file') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-center p-4">
                    <button wire:click="updateSubmission" class="bg-blue-400 rounded-lg p-2 font-semibold text-white">Update</button>
                </div>
            </form>
        </div>
        @endif

</div>