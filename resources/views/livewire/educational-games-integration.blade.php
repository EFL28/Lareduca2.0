<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Games
            </h2>
        </div>
    </x-slot>

    <!-- Listado de juegos educativos con mucho css -->
    <div class="grid grid-cols-3 gap-4 p-6">
        @foreach($games as $game)
        <div class="border border-black rounded p-4 h-48 w-48 text-center cursor-pointer">
            {{ $game->title }}
        </div>
        @endforeach

    </div>

    <!-- Integración de juegos educativos -->
    @if($selectedGameId)
    <div>
        <!-- Aquí puedes integrar el juego React seleccionado. -->
        <!-- Por ejemplo, puedes cargar un contenedor de React y cargar el juego React en él. -->
        <div id="react-game-container">
            <!-- Aquí se cargará el juego React seleccionado -->

            <!-- Ejemplo de cómo cargar un juego React en un contenedor -->
        </div>


    </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var games = document.querySelectorAll('.game');
            games.forEach(function(game) {
                game.addEventListener('click', function() {
                    var gameId = this.getAttribute('data-game-id');

                    // Aquí puedes cargar e iniciar tu juego React
                    // Esto dependerá de cómo hayas configurado tu juego React
                    // Aquí hay un ejemplo genérico:
                    var gameContainer = document.getElementById('react-game-container');
                    gameContainer.innerHTML = ''; // Limpiar el contenedor del juego
                    //startReactGame(gameId, gameContainer); // Esta función debería cargar e iniciar tu juego React
                    ReactDOM.render(

                    );

                });
            });
        });
    </script>
</div>