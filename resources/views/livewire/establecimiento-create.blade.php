
<div>

    <div class="md:grid md:grid-cols-3 md:gap-6">

        <div class="md:col-span-1">

            <div class="px-4 sm:px-0">

                <h3 class="text-lg font-medium text-gray-900">
                    Datos Principales
                </h3>

                <p class="mt-1 text-sm text-gray-600">
                    Ingresa los datos pricipales de tu establecimiento
                </p>

            </div>

        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

                <div class="shadow overflow-hidden sm:rounded-md">

                    <div class="px-4 py-5 bg-white sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div x-data="{photoName: null}" class="col-span-6 sm:col-span-4">

                                <label for="logo" class="block font-medium text-sm text-gray-700">Logo</label>

                                <input type="file" class="hidden" wire:model="logo" x-ref="photo">

                                <div class="mt-2">

                                    @if($logo)

                                        <img class="rounded h-40  object-cover" src="{{ $logo->temporaryUrl() }}" alt="">

                                    @else

                                        <img class="rounded h-40 object-cover" src="{{ asset('storage/img/logo2.png') }}" alt="">

                                    @endif

                                </div>

                                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border
                                        border-gray-300 rounded-md font-semibold text-xs text-gray-700
                                        uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none
                                        focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                                        active:bg-gray-50 transition ease-in-out duration-150 mt-2 mr-2"
                                        x-on:click="$refs.photo.click()"
                                >
                                    Selecciona tu logo
                                </button>

                                @error('logo') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre</label>

                                <input wire:model="nombre" type="text" name="nombre" id="nombre" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('nombre') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                                @error('slug') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="categoria" class="block font-medium text-sm text-gray-700">Categoría</label>

                                <select wire:model="category_id" name="category_id" id="categoria" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                    <option value="">Seleccione una categoría</option>

                                    @foreach($categorias as $categoria)

                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>

                                    @endforeach

                                </select>

                                @error('category_id') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="tags" class="block font-medium text-sm text-gray-700">Etiquetas</label>

                                @error('tags') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                                @foreach($etiquetas as $etiqueta)

                                    <label class="mr-2 text-sm">

                                        <input wire:model="tags"  type="checkbox" value="{{$etiqueta->id}}" class=" border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1">
                                        {{ $etiqueta->nombre }}

                                    </label>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

        </div>

    </div>

    <div class="hidden sm:block">

        <div class="py-8">

            <div class="border-t border-gray-200"></div>

        </div>

    </div>

    <div class="md:grid md:grid-cols-3 md:gap-6">

        <div class="md:col-span-1">

            <div class="px-4 sm:px-0">

                <h3 class="text-lg font-medium text-gray-900">
                    Datos Generales
                </h3>

                <p class="mt-1 text-sm text-gray-600">
                    Ingresa los datos generales de tu establecimiento
                </p>

            </div>

        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

                <div class="shadow overflow-hidden sm:rounded-md">

                    <div class="px-4 py-5 bg-white sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4">

                                <label for="telefono" class="block font-medium text-sm text-gray-700">Teléfono</label>

                                <input wire:model="telefono" type="number" name="telefono" id="telefono" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('telefono') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="apertura" class="block font-medium text-sm text-gray-700">Hora de apertura</label>

                                <input wire:model="apertura" type="time" name="apertura" id="apertura" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('apertura') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="cierre" class="block font-medium text-sm text-gray-700">Hora de cierre</label>

                                <input wire:model="cierre" type="time" name="cierre" id="cierre" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('cierre') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="direccion" class="block font-medium text-sm text-gray-700">Calle y número</label>

                                <input wire:model="direccion" type="text" name="direccion" id="direccion" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('direccion') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="colonia" class="block font-medium text-sm text-gray-700">Colonia</label>

                                <input wire:model="colonia" type="text" name="colonia" id="colonia" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('colonia') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="descripcion" class="block font-medium text-sm text-gray-700">Descripción</label>

                                <div wire:ignore>

                                    <div id="yourCkId">{!! $descripcion !!}</div>

                                </div>

                                <textarea wire:model="descripcion" wire:key="uniqueKey" id="descripcion" style="display:none">{!! $descripcion !!}</textarea>

                                @error('descripcion') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                        </div>

                    </div>

                </div>

        </div>

    </div>

    <div class="hidden sm:block">

        <div class="py-8">

            <div class="border-t border-gray-200"></div>

        </div>

    </div>

    <div class="md:grid md:grid-cols-3 md:gap-6">

        <div class="md:col-span-1">

            <div class="px-4 sm:px-0">

                <h3 class="text-lg font-medium text-gray-900">
                    Activación Premium
                </h3>

                <p class="mt-1 text-sm text-gray-600">
                    Solicita tu activación premium para que se muestren enlaces a tus redes sociales en cada uno de tus cupones y mostrar imágenes de tus establecimientos.
                </p>

            </div>

        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

            <div class="shadow overflow-hidden sm:rounded-md">

                <div class="px-4 py-5 bg-white sm:p-6">

                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-4 flex">

                            <input wire:model="premium" type="checkbox" name="premium" id="premium" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1">

                            <label for="premium" class="ml-3 block font-medium text-sm text-gray-700">Solicitar activación premium</label>

                            @error('premium') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                        </div>

                    </div>

                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">

                    <button wire:loading.attr="disabled" wire:click="guardar(document.querySelector('#descripcion').value)" type="button" class="inline-flex items-center px-4 py-2 bg-gray-800
                                                border border-transparent rounded-md font-semibold
                                                text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                                active:bg-gray-900 focus:outline-none focus:border-gray-900
                                                focus:shadow-outline-gray disabled:opacity-25 transition
                                                 ease-in-out duration-150"
                    >
                    Guardar Establecimiento
                    </button>
                </div>

            </div>

        </div>

    </div>
    {{-- <script>
        let logComponentsData = function () {
            Livewire.components.components().forEach(component => {
                console.log("%cComponent: " + component.name, "font-weight:bold");
                console.log(component.data);
            });
        };

        document.addEventListener("livewire:load", function(event) {
            logComponentsData();

            Livewire.hook('message.processed', (message, component) => {
                logComponentsData();
            });
        });
    </script> --}}

    <style>


        .ck-file-dialog-button{
            display:none;
        }
    </style>

    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#yourCkId' ) )
            .then( editor => {
                /* console.log( editor ); */
                editor.model.document.on( 'change:data', () => {
                    // Below @this.set breaks down my ckeditor so I am avoiding it to set ckeditor value
                    // @this.set("description", editor.getData());

                    //instead use this
                    $('#descripcion').val(editor.getData());
                } );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

</div>
