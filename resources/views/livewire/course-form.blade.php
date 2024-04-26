<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Nuevo Curso') }}
    </h2>
</x-slot>

<div class="container mx-auto p-4">
    <!-- Formulario para añadir nuevos cursos -->
    <form wire:submit.prevent="store" class="bg-red">
        <div class="">
            <label for="course_name" class="block text-md font-semibold text-gray-700">Course Name</label>
            <input wire:model="title" type="text" name="course_name" id="course_name" autocomplete="course_name" class="mt-1 mb-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="">
            <label for="course_description" class="block text-md font-semibold text-gray-700">Course Description</label>
            <textarea wire:model="description" name="course_description" class="mt-1 mb-3 w-full rounded-md border-gray-300 resize-none shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500" id="course_description" rows="3"></textarea>
        </div>

        <div class="">
            <label for="course_teacher" class="block text-md font-semibold text-gray-700">Course Teacher</label>
            <input wire:model="teacher_id" type="text" name="course_teacher" class="mt-1 mb-3 w-full rounded-md border-gray-300 resize-none shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500" id="course_Teacher" rows="3"></input>
        </div>

        <div class="mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                Add Course
            </button>
        </div>
    </form>
</div>