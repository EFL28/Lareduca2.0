<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Users Management
            </h2>

            <div>
                <a href="{{ route('user-form') }}" class="bg-green-400 rounded-lg p-2 font-semibold text-white">New user</a>
            </div>
        </div>
    </x-slot>

    <!-- Listado de users -->
    <div>
        @if(Auth::user()->role === 'teacher')
        @foreach ($users as $user)
        @if($user->role === 'student')
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                    <div class="p-4 sm:px-10 bg-white border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="font-semibold text-xl text-gray-800">{{ $user->name }}</h2>
                                <p class="text-gray-600">{{ $user->email }}</p>
                            </div>
                            <div class="w-32 flex items-center justify-between">
                                <button wire:click="edit({{ $user->id }})" class="bg-blue-400 rounded-lg p-2 font-semibold text-white">Editar</button>
                                <button wire:click="delete({{ $user->id }})" class="bg-red-400 rounded-lg p-2 font-semibold text-white ml-4">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @elseif (Auth::user()->role === 'admin')
        @foreach ($users as $user)
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                    <div class="p-4 sm:px-10 bg-white border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="font-semibold text-xl text-gray-800">{{ $user->name }}</h2>
                                <p class="text-gray-600">Email: {{ $user->email }}</p>
                                <p class="text-gray-600">Role: {{ $user->role }}</p>
                            </div>
                            <div>
                            </div>

                            <div class="w-32 flex items-center justify-between">
                                <button wire:click="edit({{ $user->id }})" class="bg-blue-400 rounded-lg p-2 font-semibold text-white">Editar</button>
                                <button wire:click="delete({{ $user->id }})" class="bg-red-400 rounded-lg p-2 font-semibold text-white ml-4">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <div>
        @if ($isModalOpen)
        <!-- Formulario para editar un usuario -->
        <div class="fixed inset-0 overflow-y-auto bg-black bg-opacity-50">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-md w-full">
                    <div class="px-6 py-4">
                        <div class="flex justify-between items-center">
                            <h2 class="font-semibold text-xl text-gray-800">{{ __('Edit user') }}</h2>
                            <button class="text-gray-600" wire:click="closeModalPopover()">X</button>
                        </div>
                        <form wire:submit.prevent="store" class="mt-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" id="name" wire:model.defer="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="mt-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">User email</label>
                                <input id="email" wire:model.defer="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md resize-none">
                            </div>
                            
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">User password</label>
                                <input type="password" id="password" wire:model.defer="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            @if(Auth::user()->role === 'admin')
                            <div class="">
                                <label for="role" class="block text-md font-semibold text-gray-700">User role</label>
                                <select wire:model="role" name="role" id="role" class="mt-1 mb-3 w-full rounded-md border-gray-300 resize-none shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="admin">Admin</option>
                                    <option value="student">Student</option>
                                    <option value="teacher">Teacher</option>
                                </select>
                            </div>
                            @endif

                            <div class="mt-4 flex justify-end">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save user
                                </button>
                                <button type="button" wire:click="closeModalPopover" class="ml-2 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancel
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