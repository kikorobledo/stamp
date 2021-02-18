<x-app-layout>

    <div class="container py-8">

        <div class="grid grid-cols-1 md:grid-cols-2">

            <div class="col-span-2 lg:col-span-1 mb-10">

                @if($establecimiento->imagen)

                    <img class="rounded-xl" src="/storage/{{ $establecimiento->imagen->url }}" alt="">

                @else

                    <img class="block h-60 w-50 mx-auto" src="{{ asset('storage/img/logo2.png')}}" alt="">

                @endif

            </div>

            <div class="text-left lg:ml-10 text-gray-500 flex">

                <div class="">

                    <p class="text-4xl mb-10 font-bold">{{$establecimiento->nombre}}</p>

                    <div class="flex mt-4 gap-2">

                        <i class="fas fa-home text-blue-700 text-2xl mr-4"></i>

                        <p class="font-semibold inline-block align-top" >{{ $establecimiento->colonia}}, {{ $establecimiento->direccion}}</p>

                    </div>

                    <div class="flex mt-4 gap-2">

                        <i class="fas fa-phone-alt text-blue-700 text-2xl mr-4"></i>

                        <p class="font-semibold inline-block align-top" >{{ $establecimiento->telefono}}</p>

                    </div>

                    <div class="flex mt-4 gap-2 mb-4">

                        <i class="far fa-clock text-blue-700 text-2xl mr-4"></i>

                        <p class="font-semibold inline-block align-top" >{{ \Carbon\Carbon::parse($establecimiento->apertura)->format('h:i') }} - {{ \Carbon\Carbon::parse($establecimiento->cierre)->format('h:i') }}</p>

                    </div>

                    @if($establecimiento->premium == 1)

                        <div>

                            @if($establecimiento->url)

                                <div class="flex mt-4 gap-2">

                                    <i class="fas fa-globe text-blue-700 text-2xl mr-4"></i>

                                    <a class="font-semibold inline-block align-top" href="{{ $establecimiento->url}}" target="_blank">{{ $establecimiento->url}}</a>

                                </div>

                            @endif

                            <div class="flex mt-4 gap-2 mb-4">

                                @if($establecimiento->facebook)

                                    <a href="{{ $establecimiento->facebook }}" class="text-blue-500 text-4xl mr-5" title="Facebook" target="_blank"><i class="fab fa-facebook" ></i></a>

                                @endif

                                @if($establecimiento->instagram)

                                    <a href="{{ $establecimiento->instagram }}" class="text-red-500 text-4xl mr-5" title="Instagram" target="_blank"><i class="fab fa-instagram-square"></i></a>

                                @endif

                                @if($establecimiento->twitter)

                                    <a href="{{ $establecimiento->twitter }}" class="text-blue-400 text-4xl mr-5" title="Twitter" target="_blank"><i class="fab fa-twitter-square"></i></a>

                                @endif

                                @if($establecimiento->maps)

                                    <a href="{{ $establecimiento->maps }}" class="text-red-600 text-4xl mr-5" title="Google Maps" target="_blank"><i class="fas fa-map-marker-alt"></i></a>

                                @endif

                            </div>

                        </div>

                    @endif

                </div>

            </div>

            <div class="col-span-2">

                <div class=" text-xl mb-5 font-thin text-gray-500">{!! $establecimiento->descripcion !!}</div>

                @if(count($fotos) > 0)

                    <div class="flex space-x-4 mt-5 mb-10">

                        @foreach($fotos as $foto)

                        <div class="flex-1">

                            <a href="/storage/{{ $foto->url }}" data-lightbox="imagenes" data-title="Imagen descriptiva">

                                <img src="/storage/{{ $foto->url }}" alt="Imágen de muestra" class="object-cover object-center w-full h-24 rounded-md">

                            </a>

                        </div>

                        @endforeach

                    </div>

                @endif

            </div>

        </div>



        @if(count($establecimiento->cupones) > 0)

            <hr>

            <h3 class="font-semibold text-3xl mt-10 text-gray-500 ">Cupones</h3>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 py-8 ">

                @foreach($establecimiento->cupones as $cupon)

                    <!-- Cupon / cupon -->
                    <article class="overflow-hidden rounded-lg shadow-lg bg-white">

                        <a href="{{ route('cupones.show', $cupon) }}">



                            @if($cupon->imagen)

                                <img alt="Imagen del cupon" class="block h-40 w-full" src="/storage/{{ $cupon->imagen->url}}">

                            @else

                                <img alt="Imagen del cupon" class="block h-40 w-full" src="{{ asset('storage/img/logo2.png')}}">

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

                                    <img alt="Logo del establecimiento" class="block rounded-full h-8 w-8" src="{{ asset('storage/img/logo2.png') }}">

                                @endif

                                <p class="ml-2 text-md">
                                    {{ $cupon->establecimiento->nombre }}
                                </p>

                            </a>

                            <div class="w-full mt-2">

                                @foreach($cupon->establecimiento->tags as $tag)

                                    <a href="{{ route('cupones.tag', $tag) }}" class="text-white rounded-full border px-3 py-0 bg-gray-400 text- font-thin">{{ $tag->nombre }}</a>

                                    @if ($loop->index == 1)
                                        @break
                                    @endif

                                @endforeach

                            </div>

                        </footer>

                    </article>

                @endforeach

            </div>

        @endif


        @if($establecimiento->premium == 1)

            <hr>

            <div>

                <h3 class="font-semibold text-3xl mt-10 mb-5 text-gray-500">Comentarios</h3>

                @livewire('crear-comentario', ['establecimiento' => $establecimiento ] )

            </div>

        @endif

    </div>

</x-app-layout>
