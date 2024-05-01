<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('New User') }}
    </h2>
</x-slot>

<div class="container mx-auto p-4">
    <!-- Formulario para añadir nuevos usuarios -->
    <form wire:submit.prevent="store" class="bg-red">
        <div class="">
            <label for="name" class="block text-md font-semibold text-gray-700">Username</label>
            <input wire:model="name" type="text" name="name" id="name" autocomplete="name" class="mt-1 mb-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="">
            <label for="email" class="block text-md font-semibold text-gray-700">User email</label>
            <input wire:model="email" name="email" class="mt-1 mb-3 w-full rounded-md border-gray-300 resize-none shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500" id="email"></textarea>
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
        @else
        <div class="">
            <label for="role" class="block text-md font-semibold text-gray-700">User role</label>
            <select wire:model="role" name="role" id="role" class="mt-1 mb-3 w-full rounded-md border-gray-300 resize-none shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
        </div>
        @endif

        <div class="">
            <label for="password" class="block text-md font-semibold text-gray-700">User password</label>
            <input wire:model="password" type="password" name="password" class="mt-1 mb-3 w-full rounded-md border-gray-300 resize-none shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500" id="password" ></input>
        </div>

        <div class="mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                Add User
            </button>
        </div>
    </form>
</div>