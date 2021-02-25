<x-app-layout>

    <div class="container py-8">

        <h1 class="text-4xl font-bold text-gray-600 mb-3">{{ $cupon->nombre }}</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3  gap-6">

            <div class="lg:col-span-2">

                <figure>

                    @if($cupon->imagen)

                        <a href="/storage/{{ $cupon->imagen->url }}" data-lightbox="imagenes" data-title="Imagen del cupón">

                            <img src="/storage/{{ $cupon->imagen->url}}" alt="Imagen del cupón" class="object-cover object-center h-80 w-full rounded-md">

                        </a>

                    @else

                        <img alt="Imagen del cupon" class="object-cover object-center h-80 w-full rounded-md" src="{{ asset('storage/img/logo2.png')}}">

                    @endif

                </figure>

                <div class="text-base text-gray-500 mt-4 mb-5">

                    <div class="lg:font-thin">{!! $cupon->descripcion !!}</div>

                    <p class="font-semibold mt-3 text-gray-500">El cupón se puede utilizar hasta el día: {{ \Carbon\Carbon::parse($cupon->fecha_de_vencimiento)->format('d/m/Y') }}</p>

                </div>

                <div class="lg:hidden">

                    @livewire('solicitar-cupon', ['cupon'=> $cupon])

                </div>

                <hr>

                <div class="mt-5">

                    <a class="flex items-center no-underline  text-gray-500 mb-2" href="{{ route('establecimientos.show', $cupon->establecimiento) }}">

                        @if($cupon->establecimiento->imagen)

                            <img alt="Logo del establecimiento" class="block rounded-full h-12 w-12" src="/storage/{{ $cupon->establecimiento->imagen->url}}">

                        @else

                            <img alt="Logo del establecimiento" class="block rounded-full h-12" src="https://picsum.photos/32/32/?random">

                        @endif

                        <p class="ml-2  font-semibold text-3xl">
                            {{ $cupon->establecimiento->nombre }}
                        </p>

                    </a>

                    <div class="mb-5 text-gray-500 lg:font-thin">{!! $cupon->establecimiento->descripcion !!}</div>

                </div>

                <div class="text-gray-500">

                    <div class="flex mt-4 gap-2">

                        <i class="fas fa-home text-blue-700 text-2xl mr-4"></i>

                        <p class="font-semibold inline-block align-top" >{{ $cupon->establecimiento->colonia}}, {{ $cupon->establecimiento->direccion}}</p>

                    </div>

                    <div class="flex mt-4 gap-2">

                        <i class="fas fa-phone-alt text-blue-700 text-2xl mr-4"></i>

                        <p class="font-semibold inline-block align-top" >{{ $cupon->establecimiento->telefono}}</p>

                    </div>

                    <div class="flex mt-4 gap-2 mb-4">

                        <i class="far fa-clock text-blue-700 text-2xl mr-4"></i>

                        <p class="font-semibold inline-block align-top" >{{ \Carbon\Carbon::parse($cupon->establecimiento->apertura)->format('h:i') }} - {{ \Carbon\Carbon::parse($cupon->establecimiento->cierre)->format('h:i') }}</p>

                    </div>

                </div>

                @if($cupon->establecimiento->premium == 1)

                    @if($cupon->establecimiento->url)

                        <div class="flex mt-4 gap-2 text-gray-500">

                            <i class="fas fa-globe text-blue-700 text-2xl mr-4"></i>

                            <a class="font-semibold inline-block align-top" href="{{ $cupon->establecimiento->url}}" target="_blank">{{ $cupon->establecimiento->url}}</a>

                        </div>

                    @endif

                    <div class="flex mt-4 gap-2 mb-4 text-gray-500">

                        @if($cupon->establecimiento->facebook)

                            <a href="{{ $cupon->establecimiento->facebook }}" class="text-blue-500 text-4xl mr-5" title="Facebook" target="_blank"><i class="fab fa-facebook" ></i></a>

                        @endif

                        @if($cupon->establecimiento->tweeter)

                            <a href="{{ $cupon->establecimiento->tweeter }}" class="text-red-500 text-4xl mr-5" title="Instagram" target="_blank"><i class="fab fa-instagram-square"></i></a>

                        @endif

                        @if($cupon->establecimiento->tweeter)

                            <a href="{{ $cupon->establecimiento->tweeter }}" class="text-blue-400 text-4xl mr-5" title="Twitter" target="_blank"><i class="fab fa-twitter-square"></i></a>

                        @endif

                        @if($cupon->establecimiento->maps)

                            <a href="{{ $cupon->establecimiento->maps }}" class="text-red-600 text-4xl mr-5" title="Google Maps" target="_blank"><i class="fas fa-map-marker-alt"></i></a>

                        @endif

                    </div>

                    @if(count($fotos) > 0)

                        <div class="flex space-x-4 mt-5 mb-5">

                            @foreach($fotos as $foto)

                            <div class="flex-1">

                                <a href="/storage/{{ $foto->url }}" data-lightbox="imagenes" data-title="Imagen descriptiva">

                                    <img src="/storage/{{ $foto->url }}" alt="Imágen de muestra" class="object-cover object-center w-full h-24 rounded-md">

                                </a>

                            </div>

                            @endforeach

                        </div>

                    @endif

                    @if(count($comentarios) > 0)

                        <hr>

                        <div>

                            <h3 class="font-semibold text-3xl mt-5 mb-5 text-gray-500">Comentarios</h3>

                            <div class="grid grid-cols-1 lg:grid-cols-3  gap-6">

                                @foreach($comentarios as $comentario)

                                    <div class="border-2 border-opacity-25 rounded-xl px-5 py-2  border-gray-300 bg-white shadow-lg">

                                        <div class="flex flex-wrap content-center h-auto ">

                                            <img alt="Foto de perfil" class="block rounded-full h-12 mr-3 mb-3" src="{{ $comentario->usuario->profile_photo_url }}">

                                            <div>
                                                <span class="inline-block align-top font-bold text-gray-500 text-lg">{{ $comentario->usuario->name }}</span>
                                                <br>
                                                <span class="text-xs text-gray-500">{{ $comentario->created_at->diffforhumans() }}</span>
                                            </div>

                                        </div>

                                        <div>

                                            <p class="text-gray-500 font-thin">{{ $comentario->contenido }}</p>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endif

                @endif

            </div>

            <aside class="hidden md:block">

                @livewire('solicitar-cupon', ['cupon'=> $cupon])

                <h1 class="text-2xl font-bold text-gray-600 mb-4 text-center">Más en {{ $cupon->establecimiento->category->nombre }}</h1>

                <ul class="mb-5">

                @foreach($cupones as $cupon)

                    @if ($loop->index == 5)
                        @break
                    @endif

                        <li class="mb-4 flex">

                            <a href="{{ route('cupones.show', $cupon) }}" class="mr-3">

                                <img alt="Imagen del cupon" class="object-cover object-center h-20 w-36 rounded-md" src="https://picsum.photos/600/400/?random">

                            </a>

                            <div>

                                <span class="ml-2 text font-bold text-gray-500">{{ $cupon->nombre }}</span>

                                <a class="flex items-center no-underline  text-gray-500 mb-2" href="{{ route('establecimientos.show', $cupon->establecimiento) }}">

                                    <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">

                                    <p class="ml-2 text-sm">

                                        {{ $cupon->establecimiento->nombre }}

                                    </p>

                                </a>

                            </div>

                        </li>

                @endforeach

                </ul>

                <div class="mt-5">

                    @foreach ($cupon->establecimiento->tags as $tag)

                        <a href="{{ route('cupones.tag', $tag) }}" class="bg-white px-5  text-lg text-gray-400 rounded-xl font-thin">{{ $tag->nombre }}</a>

                    @endforeach

                </div>

            </aside>

        </div>

    </div>

</x-app-layout>
