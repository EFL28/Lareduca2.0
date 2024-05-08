<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Administración de tareas
            </h2>

            @if(Auth::user()->role != 'student')
            <div>
                <a href="{{ route('assignment-form') }}" class="bg-green-400 rounded-lg p-2 font-semibold text-white">Nueva Tarea</a>
            </div>
            @endif
        </div>
    </x-slot>

    <!-- Listado de tareas en modo tabla -->
    <div>
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Título</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Curso</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Fecha de entrega</th>
                        @if (Auth::user()->role != 'student')
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Acciones</th>
                        @endif
                    </tr>
                </thead>
                @foreach ($assignments as $assignment)
                <tbody>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light"><a href="{{ route('assignment-submissions', ['id' => $assignment->id]) }}">{{ $assignment->title }}</a></td>
                        <td class="py-4 px-6 border-b border-grey-light"><a href="">{{ $assignment->course->title }}</a></td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $assignment->due_date }}</td>
                        @if (Auth::user()->role != 'student')
                        <td class="py-4 px-6 border-b border-grey-light">
                            <button wire:click="edit({{ $assignment->id }})" class="bg-blue-400 rounded-lg p-2 font-semibold text-white">Editar</button>
                            <button wire:click="delete({{ $assignment->id }})" class="bg-red-400 rounded-lg p-2 font-semibold text-white ml-4">Eliminar</button>
                        </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Formulario para editar una tarea -->
    <div>
        @if ($isModalOpen)
        <div class="fixed inset-0 overflow-y-auto bg-black bg-opacity-50">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-md w-full">
                    <div class="px-6 py-4">
                        <div class="flex justify-between items-center">
                            <h2 class="font-semibold text-xl text-gray-800">{{ __('Editar Tarea') }}</h2>
                            <button class="text-gray-600" wire:click="closeModalPopover()">X</button>
                        </div>
                        <form wire:submit.prevent="store" class="mt-4">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Título de la tarea</label>
                                <input type="text" id="title" wire:model.defer="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="mt-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Descripción de la tarea</label>
                                <textarea id="description" wire:model.defer="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md resize-none"></textarea>
                            </div>

                            <div class="mt-4">
                                <label for="course_id" class="block text-sm font-medium text-gray-700">Curso</label>
                                <select id="course_id" wire:model.defer="course_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4">
                                <label for="due_date" class="block text-sm font-medium text-gray-700">Fecha de entrega</label>
                                <input type="datetime-local" id="due_date" wire:model.defer="due_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                            </div>
                            <div class="mt-4">
                                <button type="submit" class="bg-blue-400 rounded-lg p-2 font-semibold text-white">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endif
    </div>
</div>