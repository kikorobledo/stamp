<x-app-layout>

    <div class="container py-8">

        <h1 class="text-4xl font-thin text-gray-600 mb-5">Códigos para: {{ $cupon->nombre }}</h1>



                <ol class="grid grid-cols-2 lg:grid-cols-5 text-xl gap-6  font-thin text-gray-600">

                    @forelse ($codigos as $codigo)

                        <li class="inline-block">{{$loop->iteration}}.- {{ $codigo->codigo }}

                            @if($codigo->canjeado_por)

                                <p class="bg-gray-500 text-white rounded-xl text-center">Canjeado por {{ $codigo->canjeadoPor->name }}</p>

                            @else

                                <p class="bg-green-500 text-white rounded-xl text-center">Disponible</p>

                            @endif

                        </li>

                    @empty

                        <h1 class="col-span-4 text-2xl font-thin text-gray-600 text-center">El cupón no tiene códigos disponibles.</h1>

                    @endforelse

                </ol>


    </div>

</x-app-layout>
