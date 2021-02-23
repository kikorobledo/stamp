
<div>

    <div class="md:grid md:grid-cols-3 md:gap-6">

        <div class="md:col-span-1">

            <div class="px-4 sm:px-0">

                <h3 class="text-lg font-medium text-gray-900">
                    Datos Principales
                </h3>

                <p class="mt-1 text-sm text-gray-600">
                    Actualiza los datos pricipales de tu cupón
                </p>

            </div>

        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

                <div class="shadow overflow-hidden sm:rounded-md">

                    <div class="px-4 py-5 bg-white sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div x-data="{photoName: null}" class="col-span-6 sm:col-span-4">

                                <label for="logo" class="block font-medium text-sm text-gray-700">Imágen</label>

                                <input type="file" class="hidden" wire:model="logo" x-ref="photo">

                                <div class="mt-2">

                                    @if($logo)

                                    <img class="rounded h-40  object-cover" src="{{ $logo->temporaryUrl() }}" alt="">

                                @else

                                    @if (!$logo && isset($cupon_logo))

                                        <img class="rounded h-40 object-cover" src="/storage/{{ $cupon_logo }}" class="w-50 p-4">

                                    @else

                                        <img class="rounded h-40 object-cover" src="{{ asset('storage/img/logo2.png') }}" alt="">

                                    @endif

                                @endif

                                </div>

                                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border
                                        border-gray-300 rounded-md font-semibold text-xs text-gray-700
                                        uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none
                                        focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800
                                        active:bg-gray-50 transition ease-in-out duration-150 mt-2 mr-2"
                                        x-on:click="$refs.photo.click()"
                                >
                                    Selecciona tu imágen
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

                                <label for="establecimiento" class="block font-medium text-sm text-gray-700">Establecimiento</label>

                                <select wire:model="establecimiento_id" name="establecimiento_id" id="establecimiento" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                    <option value="">Seleccione un establecimiento</option>

                                    @foreach($establecimientos as $establecimiento)

                                        <option value="{{ $establecimiento->id }}">{{ $establecimiento->nombre }}</option>

                                    @endforeach

                                </select>

                                @error('establecimiento_id') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

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

    <div class="md:grid md:grid-cols-3 md:gap-6 mt-5">

        <div class="md:col-span-1">

            <div class="px-4 sm:px-0">

                <h3 class="text-lg font-medium text-gray-900">
                    Datos Generales
                </h3>

                <p class="mt-1 text-sm text-gray-600">
                    Ingresa los datos generales de tu cupón
                </p>

            </div>

        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

                <div class="shadow overflow-hidden sm:rounded-md">

                    <div class="px-4 py-5 bg-white sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4">

                                <label for="codigos" class="block font-medium text-sm text-gray-700" >Número de códigos</label>

                                <input @if($codigos != null) readonly @endif wire:model="codigos" type="number" min="0" name="codigos" id="codigos" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('codigos') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="fecha_de_vencimiento" class="block font-medium text-sm text-gray-700" >Fecha De Vencimiento</label>

                                <input readonly wire:model="fecha_de_vencimiento" type="date" name="fecha_de_vencimiento" id="fecha_de_vencimiento" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('fecha_de_vencimiento') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

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

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">

                        <button wire:loading.attr="disabled" wire:click="actualizar(document.querySelector('#descripcion').value)" type="button" class="inline-flex items-center px-4 py-2 bg-gray-800
                                                    border border-transparent rounded-md font-semibold
                                                    text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                                    active:bg-gray-900 focus:outline-none focus:border-gray-900
                                                    focus:shadow-outline-gray disabled:opacity-25 transition
                                                     ease-in-out duration-150"
                        >
                        Actualizar Cupón
                        </button>
                    </div>

                </div>

        </div>

    </div>

</div>
    <style>


        .ck-file-dialog-button{
            display:none;
        }
    </style>

    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

    <script>
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
    </script>

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
