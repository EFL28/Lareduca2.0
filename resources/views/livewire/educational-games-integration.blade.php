<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Games
            </h2>
        </div>
    </x-slot>

    <!-- Listado de juegos educativos con mucho css -->
    <div class="flex justify-between align-middle p-6">
        @foreach($games as $game)
        
        <a href="{{ $game->url }}?user_id={{Auth::user()->id}}">
            <div class="border border-black rounded p-4 h-48 w-48 text-center cursor-pointer flex items-center justify-center">
                {{ $game->title }}
            </div>
        </a>
        @endforeach

    </div>
</div>