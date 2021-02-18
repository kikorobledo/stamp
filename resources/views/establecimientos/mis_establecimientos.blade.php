<x-app-layout>

    <div class="container py-8">

        <div class="lg:flex lg:justify-between">

            <h1 class="text-4xl font-thin text-gray-600 mb-5">Mis Establecimientos</h1>

            <a href="{{ route('establecimientos.create') }}" class="px-5 h-10 py-1 bg-white border-2 border-gray-700 font-thin rounded-2xl hover:bg-gray-700 hover:text-white"><span class="xs:align-top lg:align-middle">Agregar un nuevo establecimiento</span></a>

        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 py-8">

            @forelse($establecimientos as $establecimiento)

                    <!-- Cupon / cupon -->
                    <article class="overflow-hidden rounded-lg shadow-lg bg-white">

                        <a href="{{ route('establecimientos.show', $establecimiento) }}">



                            @if($establecimiento->imagen)

                                <img alt="Imagen del cupon" class="block h-40 w-full" src="/storage/{{ $establecimiento->imagen->url}}">

                            @else

                                <img alt="Imagen del cupon" class="block h-40 w-full" src="{{ asset('storage/img/logo2.png')}}">

                            @endif

                        </a>

                        <header class="flex items-center flex-col leading-tight px-2 pt-2 md:px-4 md:pt-2">

                            <h1 class="text-lg">

                                <a class="no-underline font-light text-gray-500" href="{{ route('establecimientos.show', $establecimiento)}}">
                                    {{ $establecimiento->nombre }}
                                </a>

                            </h1>

                        </header>

                        <footer class="flex flex-col  leading-none p-2 md:p-4">

                            <div class="w-full mt-2 flex justify-between text-center">

                                <div class="flex flex-col w-1/3">

                                    <span
                                        class="w-full text-white rounded-full border px-3 py-0
                                            @if($establecimiento->estado == 'activo')
                                            bg-green-500
                                            @elseif($establecimiento->estado == 'revision')
                                            bg-yellow-400
                                            @endif
                                            text-sm font-thin mr-3"
                                    >
                                        {{ ucfirst($establecimiento->estado) }}
                                    </span>

                                    @if($establecimiento->premium == 1)

                                        <span class="w-full text-white text-sm font-thin rounded-full border px-3 py-0 bg-yellow-500">Premium</span>

                                    @else

                                        <span class="w-full text-white text-sm font-thin rounded-full border px-3 py-0 bg-gray-500">Free</span>

                                    @endif

                                </div>

                                <div class="flex flex-col w-1/3">

                                    <a href="{{ route('establecimientos.edit', $establecimiento) }}" class="w-full float-right text-white text-sm font-thin rounded-full border px-3 py-0 bg-blue-300">Editar</a>

                                    <form action="{{ route('establecimientos.destroy', $establecimiento) }}" method="POST" x-data x-ref="form">

                                        @csrf
                                        <button x-on:click.prevent="if (confirm('¿Estas Seguro que deseas eliminar el establecimiento?')) $refs.form.submit()" type="submit" class="w-full float-right text-white text-sm font-thin rounded-full border px-3 py-0 bg-red-500">Eliminar</button>
                                    </form>

                                </div>

                            </div>

                        </footer>

                    </article>

            @empty

                <h1 class="col-span-4 text-2xl font-thin text-gray-600 text-center">No tienes establecimientos para mostrar</h1>

            @endforelse

        </div>

        <div class="font-thin text-gray-600">

            {{ $establecimientos->links() }}

        </div>

    </div>

</x-app-layout>


