<x-app-layout>

    <div class="container">

        <h1 class="text-4xl font-thin text-gray-600 mb-4 mt-5">Cupones Para {{ $category->nombre }}</h1>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 py-8">

            @forelse($cupones as $cupon)

                    <!-- Cupon / cupon -->
                    <article class="overflow-hidden rounded-lg shadow-lg">

                        <a href="{{ route('cupones.show', $cupon) }}">

                            @if($cupon->imagen)

                                <img alt="Imagen del cupon" class="block h-40 w-full" src="/storage/{{ $cupon->imagen->url}}">

                            @else

                                <img alt="Imagen del cupon" class="block h-40 w-full" src="{{ asset('storage/img/logo2.png')}}">

                            @endif

                        </a>

                        <header class="flex items-center flex-col leading-tight px-2 pt-2 md:px-4 md:pt-2">

                            <h1 class="text-lg">

                                <a class="no-underline hover:underline text-black" href="{{ route('cupones.show', $cupon) }}">
                                    {{ $cupon->nombre }}
                                </a>

                            </h1>

                            <p class="text-grey-darker text-sm">
                                Vence: {{ \Carbon\Carbon::parse($cupon->fecha_de_vencimiento)->format('d/m/Y') }}
                            </p>

                        </header>

                        <footer class="flex  flex-col leading-none p-2 md:p-4">

                            <a class="flex items-center no-underline hover:underline text-black mb-2" href="{{ route('establecimientos.show',$cupon->establecimiento) }}">

                                @if($cupon->establecimiento->imagen)

                                    <img alt="Imagen del cupon" class="block rounded-full h-8" src="/storage/{{ $cupon->establecimiento->imagen->url}}">

                                @else

                                    <img alt="Imagen del cupon" class="block rounded-full h-8" src="{{ asset('storage/img/logo2.png')}}">

                                @endif

                                <p class="ml-2 text-sm">
                                    {{ $cupon->nombre_establecimiento }}
                                </p>

                            </a>

                            <div class="w-full">

                                @foreach($cupon->tags as $tag)

                                    <a href="{{ route('cupones.tag', $tag) }}" class="text-white rounded-full border px-3 bg-gray-400">{{ $tag->nombre }}</a>

                                    @if ($loop->index == 1)
                                        @break
                                    @endif

                                @endforeach

                            </div>

                        </footer>

                    </article>

            @empty

                <h1 class="col-span-4 text-2xl font-thin text-gray-600 text-center">Aún no hay cupones para mostrar</h1>

            @endforelse

        </div>

        <div class="mt-4 ">

            {{ $cupones->links() }}

        </div>

    </div>

</x-app-layout>
