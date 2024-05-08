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
    <!-- Tabla resumen de estudiantes y su entrega de la tarea -->
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
                        <td class="py-4 px-6 border-b border-grey-light">{{ $submission->user_id}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $submission->submitted_at }}</td>
                        <td>{{ $submission->submission_file }}</td>
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
    @else
    <!-- Formulario para enviar la entrega de la tarea -->
    <div class="bg-white shadow-md rounded my-6">
        <form wire:submit.prevent="submit">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" wire:model="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea wire:model="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4">
                <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File:</label>
                <input type="file" wire:model="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('file') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-400 rounded-lg p-2 font-semibold text-white">Submit</button>
            </div>
        </form>
    </div>
    @endif

</div>