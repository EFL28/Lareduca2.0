<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Administración de tareas
            </h2>

            @if(Auth::user()->role === 'teacher')
            <div>
                <a href="{{ route('assignment-form') }}"class="bg-green-400 rounded-lg p-2 font-semibold text-white">Nueva Tarea</a>
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
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Acciones</th>
                    </tr>
                </thead>
                @foreach ($assignments as $assignment)
                <tbody>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $assignment->title }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $assignment->course->title }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $assignment->due_date }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <a href="#" class="text-blue-500">Editar</a>
                            <a href="#" class="text-red-500">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>

    </div>
</div>