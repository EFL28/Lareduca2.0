<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Nueva Tarea') }}
    </h2>
</x-slot>

<div class="container mx-auto p-4">
    <!-- Formulario para añadir nuevas tareas -->
    <form wire:submit.prevent="store" class="bg-red">
        <div class="">
            <label for="assignment_title" class="block text-md font-semibold text-gray-700">Título de la tarea</label>
            <input wire:model="title" type="text" name="assignment_title" id="assignment_title" autocomplete="assignment_title" class="mt-1 mb-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="">
            <label for="assignment_description" class="block text-md font-semibold text-gray-700">Descripción de la tarea</label>
            <textarea wire:model="description" name="assignment_description" class="mt-1 mb-3 w-full rounded-md border-gray-300 resize-none shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500" id="assignment_description" rows="3"></textarea>
        </div>

        <div class="">
            <label for="assignment_course" class="block text-md font-semibold text-gray-700">Curso</label>
            <select wire:model="course_id" name="assignment_course" class="mt-1 mb-3 w-full rounded-md border-gray-300 resize-none shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500" id="assignment_course">
                <option value="">Selecciona un curso</option>
                @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="assignment_due_date" class="block text-md font-semibold text-gray-700">Fecha de entrega</label>
            <input wire:model="due_date" type="datetime-local" name="assignment_due_date" class="mt-1 mb-3 w-full rounded-md border-gray-300 resize-none shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500" id="assignment_due_date" rows="3"></input>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-green-400 rounded-lg p-2 font-semibold text-white">Guardar</button>
        </div>
    </form>
</div>