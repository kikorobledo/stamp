<x-app-layout>

    <div class="container">

        <div class="owl-carousel owl-theme mt-5 mb-5">

            @forelse($banners as $banner)

                @if($banner->imagen)

                    <div class="item">
                        <img alt="Placeholder" class="block h-auto w-full rounded-lg" src="/storage/{{ $banner->imagen->url }}">
                    </div>

                @endif

            @empty

                <h1 class="col-span-4 text-2xl font-thin text-gray-600 text-center">No hay banners para mostrar</h1>

            @endforelse


            {{-- <div class="item">
                <img alt="Placeholder" class="block h-auto w-full rounded-lg" src="{{ asset('storage/img/banner2.png') }}">
            </div>

            <div class="item">
                <img alt="Placeholder" class="block h-auto w-full rounded-lg" src="{{ asset('storage/img/banner3.png') }}">
            </div>

            <div class="item">
                <img alt="Placeholder" class="block h-auto w-full rounded-lg" src="{{ asset('storage/img/banner4.png') }}">
            </div> --}}

        </div>

        <div class="justify-center grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 mt-5 mb-5  px-5">

            <a href="{{ route('cupones.categoria', 'hoteles')}}" class="">
                <img alt="Placeholder" class="block h-auto w-full rounded-lg " style="width:70%;" src="{{ asset('storage/img/icon1.svg') }}">
            </a>

            <a href="{{ route('cupones.categoria', 'restaurant')}}" class="">
                <img alt="Placeholder" class="block h-auto w-full rounded-lg "  style="width:70%;" src="{{ asset('storage/img/icon2.svg') }}">
            </a>

            <a href="{{ route('cupones.categoria', 'hospitales')}}" class="">
                <img alt="Placeholder" class="block h-auto w-full rounded-lg "  style="width:70%;" src="{{ asset('storage/img/icon3.svg') }}">
            </a>

            <a href="{{ route('cupones.categoria', 'gimnacios')}}" class="">
                <img alt="Placeholder" class="block h-auto w-full rounded-lg "  style="width:70%;" src="{{ asset('storage/img/icon4.svg') }}">
            </a>

            <a href="{{ route('cupones.categoria', 'bares')}}" class="">
                <img alt="Placeholder" class="block h-auto w-full rounded-lg "  style="width:70%;" src="{{ asset('storage/img/icon5.svg') }}">
            </a>

            <a href="{{ route('cupones.categoria', 'tienda')}}" class="">
                <img alt="Placeholder" class="block h-auto w-full rounded-lg "  style="width:70%;" src="{{ asset('storage/img/icon6.svg') }}">
            </a>

        </div>

        <div class="mt-10">

            <img class="w-full rounded-xl" src="{{ asset('storage/img/elige.png') }}" alt="">

        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 py-8 mt-5">

            @forelse($cupones as $cupon)

                    <!-- Cupon / cupon -->
                    <article class="overflow-hidden rounded-lg shadow-lg bg-white">

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

                        <footer class="flex  flex-col leading-none p-2 md:p-4">

                            <a class="flex items-center no-underline font-light text-gray-500 mb-2" href="{{ route('establecimientos.show', $cupon->establecimiento) }}">

                                @if($cupon->establecimiento->imagen)

                                    <img alt="Logo del establecimiento" class="block rounded-full h-8 w-8" src="/storage/{{ $cupon->establecimiento->imagen->url }}">

                                @else

                                    <img alt="Logo del establecimiento" class="block rounded-full h-8" src="{{ asset('storage/img/logo2.png') }}">

                                @endif

                                <p class="ml-2 text-md">
                                    {{ $cupon->establecimiento->nombre }}
                                </p>

                            </a>

                            <div class="w-full mt-2">

                                @foreach($cupon->establecimiento->tags as $tag)

                                    <a href="{{ route('cupones.tag', $tag) }}" class="text-white rounded-full border px-3 py-0 bg-gray-400 text-sm font-thin">{{ $tag->nombre }}</a>

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

        <div class="mt-4 font-thin text-gray-600">

            {{ $cupones->links() }}

        </div>

    </div>

</x-app-layout>
