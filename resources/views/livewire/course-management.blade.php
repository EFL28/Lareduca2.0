<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 flex items-center">
                Administración de cursos
            </h2>

            <div class="flex">
                <button class="bg-green-400 rounded-lg p-2 font-semibold text-white">New Course</button>
            </div>
        </div>
    </x-slot>


    <!-- Listado de cursos -->
    <div>
        @foreach ($courses as $course)
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl rounded-lg sm:rounded-lg">
                    <div class="p-4 sm:px-10 bg-white border-b border-gray-200">
                        <div class="flex justify-between">
                            <div class="flex items-center ">
                                <h2 class="font-semibold text-xl text-gray-800 ml-4">{{ $course->title }}</h2>
                                <p class="ml-4">{{ $course->description }}</p>
                            </div>
                            <div class=" w-32 flex items-center justify-between">
                                <button class="bg-blue-400 rounded-lg p-2 font-semibold text-white">Edit</button>
                                <button wire:click="deleteCourse({{ $course->id }})" class="bg-red-400 rounded-lg p-2 font-semibold text-white ml-4">Delete</button>

                                <!-- <button class="bg-red-400 rounded-lg p-2 font-semibold text-white" onclick="event.preventDefault(); document.getElementById('delete-course-form-{{ $course->id }}').submit();">Delete</button>

                                <form id="delete-course-form-{{ $course->id }}" action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach


    </div>
</x-app-layout>
