<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Administración de cursos
            </h2>

            <div>
                <a href="{{ route('course-form') }}" class="bg-green-400 rounded-lg p-2 font-semibold text-white">Nuevo Curso</a>
            </div>
        </div>
    </x-slot>
    <!-- Listado de cursos -->
    <div>
        @foreach ($courses as $course)
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                    <div class="p-4 sm:px-10 bg-white border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="font-semibold text-xl text-gray-800">{{ $course->title }}</h2>
                                <p class="text-gray-600">{{ $course->description }}</p>
                            </div>
                            <div class="w-32 flex items-center justify-between">
                                <button wire:click="edit({{ $course->id }})" class="bg-blue-400 rounded-lg p-2 font-semibold text-white">Editar</button>
                                <button wire:click="delete({{ $course->id }})" class="bg-red-400 rounded-lg p-2 font-semibold text-white ml-4">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div>
        @if ($isModalOpen)
        <!-- Formulario para editar un curso -->
        <div class="fixed inset-0 overflow-y-auto bg-black bg-opacity-50">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-md w-full">
                    <div class="px-6 py-4">
                        <div class="flex justify-between items-center">
                            <h2 class="font-semibold text-xl text-gray-800">{{ __('Editar Curso') }}</h2>
                            <button class="text-gray-600" wire:click="closeModalPopover()">X</button>
                        </div>
                        <form wire:submit.prevent="store" class="mt-4">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Course Name</label>
                                <input type="text" id="title" wire:model.defer="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mt-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Course Description</label>
                                <textarea id="description" wire:model.defer="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md resize-none"></textarea>
                            </div>
                            <div>
                                <label for="teacher" class="block text-sm font-medium text-gray-700">Course Teacher</label>
                                <input type="number" id="teacher" wire:model.defer="teacher_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mt-4 flex justify-end">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Guardar Curso
                                </button>
                                <button type="button" wire:click="closeModalPopover" class="ml-2 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
