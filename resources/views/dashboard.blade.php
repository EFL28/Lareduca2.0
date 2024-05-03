<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div> -->

    <!-- Mostrar diferentes componentes de Livewire -->
    <!-- Si eres student mostrar los cursos inscritos, pending assignments -->

    @if(Auth::user()->role === 'student')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight p-6">
                        Cursos inscritos
                    </h2>
                </div>
                <div class="p-6">
                    @livewire('course-enrollment')
                </div>
            </div>
        </div>
    </div>
    @endif

</x-app-layout>
