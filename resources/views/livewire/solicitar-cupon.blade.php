<div>

    @auth

        <div wire:click="solicitar" class="cursor-pointer text-4xl rounded-lg bg-indigo-900 text-white text-center p-5 mb-5">
            @if($disponibilidad)

                Solicitar Cupón

            @else

                @if($codigo)

                    <p>Tu Código</p>
                    <p>{{ $codigo->codigo }}</p>

                @else

                    <p>No hay códigos disponibles</p>

                @endif

            @endif

        </div>

    @endauth

    @guest
        <div class="cursor-pointer text-4xl rounded-lg bg-indigo-900 text-white text-center p-5 mb-5">
            <p>Inicia sesión para solicitar un cupón</p>
        </div>
    @endguest


</div>
