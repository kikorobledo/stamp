
<div>

    <div class="md:grid md:grid-cols-3 md:gap-6">

        <div class="md:col-span-1">

            <div class="px-4 sm:px-0">

                <h3 class="text-lg font-medium text-gray-900">
                    Datos Principales
                </h3>

                <p class="mt-1 text-sm text-gray-600">
                    Actualiza los datos pricipales de tu establecimiento
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

                                        @if (!$logo && isset($establecimiento_logo))

                                            <img class="rounded h-40 object-cover" src="/storage/{{ $establecimiento_logo }}" class="w-50 p-4">

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

                            {{-- <div
                                    class="form-textarea w-full"
                                    x-data
                                    x-init="
                                    ClassicEditor.create($refs.myIdentifierHere)
                                        .then( function(editor){
                                            editor.model.document.on('change:data', () => {
                                            $dispatch('descripcion', editor.getData())
                                            })
                                        })
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                    "
                                    wire:ignore
                                    wire:key="myIdentifierHere"
                                    x-ref="myIdentifierHere"
                                    wire:model.debounce.9999999ms="descripcion"
                                >{!! $descripcion !!}
                            </div> --}}

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

                @if($establecimiento_premium == 1)

                    <h3 class="text-lg font-medium text-gray-900">
                        Datos Premium
                    </h3>

                    <p class="mt-1 text-sm text-gray-600">
                        Actualiza los datos premium de tu establecimiento
                    </p>

                @else

                    <h3 class="text-lg font-medium text-gray-900">
                        Activación Premium
                    </h3>

                    <p class="mt-1 text-sm text-gray-600">
                        Solicita tu activación premium para que se muestren enlaces a tus redes sociales en cada uno de tus cupones y mostrar imágenes de tu establecimiento.
                    </p>

                @endif

            </div>

        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

            <div class="shadow overflow-hidden sm:rounded-md">

                @if($establecimiento_premium == 2)

                    <p class=" py-2 ml-3 block font-medium text-sm text-gray-700">Solicitud Premium enviada, espera a que un administrador active tus funciones premium.</p>

                @elseif($establecimiento_premium != 1)

                    <div class="px-4 py-5 bg-white sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4 flex">

                                <input wire:model="premium" type="checkbox" name="premium" id="premium" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1">

                                <label for="premium" class="ml-3 block font-medium text-sm text-gray-700">Solicitar activación premium</label>

                                @error('premium') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                        </div>

                    </div>

                @endif

                @if($establecimiento_premium == 1)

                <div class="shadow overflow-hidden sm:rounded-md">

                    <div class="px-4 py-5 bg-white sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4">

                                <label for="url" class="block font-medium text-sm text-gray-700">Dirección web</label>

                                <input wire:model="url" type="url" name="url" id="url" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('url') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="facebook" class="block font-medium text-sm text-gray-700">Facebook</label>

                                <input wire:model="facebook" type="url" name="facebook" id="facebook" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('facebook') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="twitter" class="block font-medium text-sm text-gray-700">Twitter</label>

                                <input wire:model="twitter" type="url" name="twitter" id="twitter" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('twitter') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="instagram" class="block font-medium text-sm text-gray-700">instagram</label>

                                <input wire:model="instagram" type="url" name="instagram" id="instagram" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('instagram') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="maps" class="block font-medium text-sm text-gray-700">Google maps</label>

                                <input wire:model="maps" type="url" name="maps" id="maps" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">

                                @error('maps') <span class="block font-medium text-sm text-red-500">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-span-6 sm:col-span-4">

                                <label for="maps" class="block font-medium text-sm text-gray-700">Imagenes</label>

                                <div class="dropzone border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="dropzone"></div>

                                <input type="hidden" id="uuid", value="{{ $establecimiento->uuid }}">

                                @foreach($fotos as $foto)

                                    <input type="hidden" class="galeria" value="{{ $foto->url }}">

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

                @endif


                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">

                    <button wire:loading.attr="disabled" wire:click="actualizar($('#descripcion').val())" type="button" class="inline-flex items-center px-4 py-2 bg-gray-800
                                                border border-transparent rounded-md font-semibold
                                                text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                                active:bg-gray-900 focus:outline-none focus:border-gray-900
                                                focus:shadow-outline-gray disabled:opacity-25 transition
                                                 ease-in-out duration-150"
                    >
                    Actualizar Establecimiento
                    </button>
                </div>

            </div>

        </div>

    </div>

    <style>

        #dropzone {
            height: auto;
        }

        .dropzone .dz-preview .dz-image img{
            display: block;
            object-fit: scale-down;
            width: 100%;
        }

        .ck-file-dialog-button{
            display:none;
        }
    </style>

    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js" integrity="sha512-8l10HpXwk93V4i9Sm38Y1F3H4KJlarwdLndY9S5v+hSAODWMx3QcAVECA23NTMKPtDOi53VFfhIuSsBjjfNGnA==" crossorigin="anonymous" defer></script>

    <script>
        /* window.onload = function() {
            if (window.jQuery) {
                // jQuery is loaded
                alert("Yeah!");
            } else {
                // jQuery is not loaded
                alert("Doesn't Work");
            }
        } */

        /* Estatus de variables */
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

        /* Dropezone */
        if(document.getElementById("dropzone")){

            document.addEventListener('livewire:load', function () {
                /* Dropezone */
                Dropzone.autoDiscover = false;

                const dropzone = new Dropzone('div#dropzone',{
                    url: '/imagenes/store',
                    dictDefaultMessage:'Sube hasta 4 imágenes',
                    maxFiles:4,
                    required:false,
                    acceptedFiles:".png, .jpg, .gif, .jpeg",
                    addRemoveLinks:true,
                    dictRemoveFile:"Eliminar Imagen",
                    headers:{
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                    },
                    init: function(){
                        const galeria = document.querySelectorAll('.galeria');
                        if(galeria.length > 0){

                            galeria.forEach(imagen => {
                                const imagenPublicada = {};
                                imagenPublicada.size = 1;
                                imagenPublicada.name = imagen.value;
                                imagenPublicada.nombreServidor = imagen.value;

                                this.options.addedfile.call(this, imagenPublicada);
                                this.options.thumbnail.call(this, imagenPublicada, `/storage/${imagenPublicada.name}`);

                                imagenPublicada.previewElement.classList.add('dz-success');
                                imagenPublicada.previewElement.classList.add('dz-complete');
                            });
                        }
                    },
                    success: function(file, respuesta){
                        /* console.log(file) */
                        /* console.log(respuesta); */
                        file.nombreServidor = respuesta.archivo;
                    },
                    sending: function(file, xhr, formData){
                        formData.append('uuid', document.getElementById('uuid').value)
                        /* console.log('enviando') */
                    },
                    removedfile: function(file, respuesta){
                        /* console.log(file); */
                        const params = {
                            imagen:file.nombreServidor
                        }

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                            },
                            type:'POST',
                            url:'/imagenes/destroy',
                            data: params,
                            dataType:'json',
                            success: function(respuesta){
                                /* console.log(respuesta); */
                                file.previewElement.parentNode.removeChild(file.previewElement);
                            }
                        })

                    }
                });
            })
        }

        ClassicEditor
            .create( document.querySelector( '#yourCkId' ) )
            .then( editor => {

                editor.model.document.on( 'change:data', () => {

                    $('#descripcion').val(editor.getData());

                } );
            } )
            .catch( error => {
                console.error( error );
            } );

    </script>

</div>
