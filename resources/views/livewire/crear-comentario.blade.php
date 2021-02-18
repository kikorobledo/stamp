<div class="">

    @auth

        <form class="" wire:submit.prevent="enviarComentario" >

            <Textarea wire:model="contenido" class="w-full rounded-xl border border-gray-500 focus:border-gray-500 focus:ring-2 focus:ring-offset-2 mb-2 focus:ring-gray-600" placeholder="Has un comentario a {{ $establecimiento->nombre }}"></Textarea>

            <div>

                @error('contenido') <span class="error text-xs text-red-500">{{ $message }}</span> @enderror

            </div>

            <button type="submit" class="rounded-xl px-3 py-1 font-thin bg-white  border border-gray-500 mb-5 float-right text-gray-500 hover:text-white hover:bg-gray-500">Enviar comentario</button>

        </form>

    @endauth

    <div class="grid  grid-cols-1 lg:grid-cols-4  gap-6 w-full mt-5">

        @foreach($comentarios->reverse() as $comentario)

            <div class="border-2 border-opacity-25 rounded-xl px-5 py-2 flex-shrink border-gray-300 bg-white shadow-lg">

                <div class="flex flex-wrap content-center  ">

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
