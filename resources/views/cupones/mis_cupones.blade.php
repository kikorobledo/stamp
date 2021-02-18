<x-app-layout>

    <div class="container py-8">

        <div class="lg:flex lg:justify-between">

            <h1 class="text-4xl font-thin text-gray-600 mb-5">Mis Cupones</h1>

            <a href="{{ route('cupones.create') }}" class="px-5 h-10 py-1 bg-white border-2 border-gray-700 font-thin rounded-2xl hover:bg-gray-700 hover:text-white"><span class="xs:align-top lg:align-middle">Agregar un nuevo cupón</span></a>

        </div>

        @forelse($establecimientos as $establecimiento)

            @if($establecimiento->cupones->isEmpty())
                @continue
            @endif

            <div class="col-span-4 flex mt-4">

                @if($establecimiento->imagen)

                    <img alt="Imagen del cupon" class="block h-10 rounded-md" src="/storage/{{ $establecimiento->imagen->url}}">

                @else

                    <img alt="Imagen del cupon" class="block h-10 rounded-md" src="{{ asset('storage/img/logo2.png')}}">

                @endif

                <a class="no-underline font-light text-gray-500 text-3xl ml-5" href="{{ route('establecimientos.show', $establecimiento)}}">
                    {{ $establecimiento->nombre }}
                </a>

            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 py-8 mt-5">

                @foreach($establecimiento->cupones as $cupon)

                    {{--  @if($cupon->estado == 'eliminado')
                        @continue
                    @endif --}}

                    <!-- Cupon / cupon -->
                    <article class=" rounded-lg shadow-lg bg-white overflow-hidden">

                        <a href="{{ route('cupones.show', $cupon) }}">

                            @if($cupon->imagen)

                                <img alt="Imagen del cupon" class="block h-40 w-full" src="/storage/{{ $cupon->imagen->url}}">

                            @else

                                <img alt="Imagen del cupon" class="block h-40 w-full" src="https://picsum.photos/600/400/?random">

                            @endif

                        </a>

                        <header class="flex items-center flex-col leading-tight px-2 pt-2 md:px-4 md:pt-2">

                            <h1 class="text-lg">

                                <a class="no-underline font-light text-gray-500" href="{{ route('cupones.show', $cupon)}}">
                                    {{ $cupon->nombre }}
                                </a>

                            </h1>

                            <p class="text-gray-500 text-sm font-thin">
                                Vence: {{ \Carbon\Carbon::parse($cupon->fecha_de_vencimiento)->format('d/m/Y') }}
                            </p>

                        </header>

                        <footer class="flex flex-col  leading-none p-2 md:p-4">

                            <div class="w-full mt-2 flex justify-between text-center">

                                <div class="flex flex-col w-1/3">

                                    <span
                                        class="w-full text-white rounded-full border px-3 py-0
                                            @if($cupon->estado == 'activo')
                                            bg-green-500
                                            @elseif($cupon->estado == 'revision')
                                            bg-yellow-400
                                            @elseif($cupon->estado == 'expirado')
                                            bg-red-500
                                            @elseif($cupon->estado == 'eliminado')
                                            bg-red-500
                                            @endif
                                            text-sm font-thin mr-3"
                                    >
                                        {{ ucfirst($cupon->estado) }}
                                    </span>

                                </div>

                                <div class="flex flex-col w-1/3">

                                    <a href="{{ route('cupones.edit', $cupon) }}" class="w-full float-right text-white text-sm font-thin rounded-full border px-3 py-0 bg-blue-300">Editar</a>

                                    <form action="{{ route('cupones.destroy', $cupon) }}" method="POST" x-data x-ref="form">

                                        @csrf
                                        <button x-on:click.prevent="if (confirm('¿Estas Seguro que deseas eliminar el cupón?')) $refs.form.submit()" type="submit" class="w-full float-right text-white text-sm font-thin rounded-full border px-3 py-0 bg-red-500">Eliminar</button>
                                    </form>

                                </div>

                            </div>

                        </footer>

                    </article>

                @endforeach

            </div>

        @empty

            <h1 class="col-span-4 text-2xl font-thin text-gray-600 text-center">No tienes cupones para mostrar</h1>

        @endforelse


        <div class="font-thin text-gray-600">

            {{ $establecimientos->links() }}

        </div>

    </div>

</x-app-layout>
