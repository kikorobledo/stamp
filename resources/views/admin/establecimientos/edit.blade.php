@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')
    <h1>Editar Establecimiento</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">

            {!! Form::model($establecimiento, ['route' => ['admin.establecimientos.update', $establecimiento],'method' => 'PUT', 'files' => true]) !!}

            <div class="row">

                <div class="col-12 col-md-6">

                    <fieldset class="border p-4">

                        <legend class="text-primary">Nombre, Categoría y Logo</legend>

                        <div class="form-group">

                            {!! Form::label('user_id', 'Usuario') !!}
                            {!! Form::select('user_id', $usuarios, null, ['class' => 'form-control' . ($errors->has('usuario_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un usuario']) !!}

                            @error('user_id')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control'  . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del establecimiento']) !!}

                            @error('nombre')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['class' => 'form-control'  . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Slug del establecimiento', 'readonly']) !!}

                            @error('slug')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('category_id', 'Categoría') !!}
                            {!! Form::select('category_id', $categorias, null, ['class' => 'form-control'  . ($errors->has('category_id') ? ' is-invalid' : ''),'placeholder' => 'Selecciona una categoría']) !!}

                            @error('category_id')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('estado', 'Estado') !!}
                            {!! Form::select('estado', ['activo' => 'Activo','eliminado' => 'Eliminado','revision' => 'Revisión'], null, ['class' => 'form-control'  . ($errors->has('estado') ? ' is-invalid' : ''),'placeholder' => 'Selecciona una categoría']) !!}

                            @error('estado')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('tags', 'Etiquetas') !!}
                            <br>

                            @error('tags')

                                <br>

                                <small class="text-danger">

                                    <strong>{{ $message }}</strong>

                                </small>

                                <br>

                            @enderror

                            @foreach($tags as $tag)

                                <label class="mr-2">
                                    {!! Form::checkbox('tags[]', $tag->id, null) !!}
                                    {{ $tag->nombre }}
                                </label>

                            @endforeach

                        </div>

                    </fieldset>

                </div>

                <div class="col-12 col-md-6">

                    <fieldset class="border p-4">

                        <legend  class="text-primary">Información Establecimiento</legend>

                        <div class="form-group">

                            {!! Form::label('telefono', 'Telefono') !!}
                            {!! Form::number('telefono', null, ['class' => 'form-control'  . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el teléfono del establecimiento']) !!}

                            @error('telefono')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('descripcion', 'Descripción') !!}
                            {!! Form::textarea('descripcion', null, ['class' =>'form-control'  . ($errors->has('descripcion') ? ' is-invalid' : '')]) !!}

                            @error('descripcion')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('apertura', 'Hora de apertura') !!}
                            {!! Form::time('apertura', \Carbon\Carbon::parse($establecimiento->apertura)->format('h:i'), ['class' =>'form-control'  . ($errors->has('apertura') ? ' is-invalid' : '')]) !!}

                            @error('apertura')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('cierre', 'Hora de cierre') !!}
                            {!! Form::time('cierre', \Carbon\Carbon::parse($establecimiento->cierre)->format('h:i'), ['class' =>'form-control'  . ($errors->has('cierre') ? ' is-invalid' : '')]) !!}

                            @error('cierre')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('direccion', 'Dirección') !!}
                            {!! Form::text('direccion', null, ['class' => 'form-control'  . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la calle y número del establecimiento']) !!}

                            @error('direccion')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('colonia', 'Colonia') !!}
                            {!! Form::text('colonia', null, ['class' => 'form-control'  . ($errors->has('colonia') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la colonia del establecimiento']) !!}

                            @error('colonia')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                    </fieldset>

                </div>

                <div class="col-12 col-md-6">

                    <fieldset class="border p-4">

                        <legend class="text-primary">Imágenes</legend>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    {!! Form::label('file', 'Imágen Principal') !!}
                                    {!! Form::file('file', ['class' => 'form-control-file' . ($errors->has('file') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona tu logo']) !!}

                                    @error('user_id')

                                        <span class="invalid-feedback">

                                            <strong>{{ $message }}</strong>

                                        </span>

                                    @enderror

                                </div>

                            </div>

                            <div class="col">

                                @if($establecimiento->imagen)

                                    <img id="imagen-principal" class="" style="width:60%;" src="/storage/{{ $establecimiento->imagen->url }}" alt="">

                                @else

                                    <img id="imagen-principal" class="" style="width:60%;" src="{{ asset('storage/img/logo2.png') }}" alt="">

                                @endif

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('dropzone', 'Imágenes secundarias') !!}

                            <div class="dropzone form-control" id="dropzone"></div>

                        </div>

                    </fieldset>

                </div>

                <div class="col-12 col-md-6">

                    <fieldset class="border p-4">

                        <legend class="text-primary">Premium</legend>

                        <div class="form-group">

                            {!! Form::checkbox('box', null, null, ['class' => 'mr-2', 'id' => 'box']) !!}
                            {!! Form::label('box', 'Opciones premium') !!}
                            {!! Form::hidden('premium', null, ['id' => 'premium']) !!}

                            @error('premium')

                                    <span class="invalid-feedback">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                        </div>

                        <div class="div-premium d-none">

                            <div class="form-group">

                                {!! Form::label('url', 'URL') !!}
                                {!! Form::url('url', null, ['class' => 'form-control'  . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la dirección electrónica del establecimiento']) !!}

                                @error('url')

                                    <span class="invalid-feedback">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                            <div class="form-group">

                                {!! Form::label('facebook', 'Facebook') !!}
                                {!! Form::url('facebook', null, ['class' => 'form-control'  . ($errors->has('facebook') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la dirección Facebook']) !!}

                                @error('facebook')

                                    <span class="invalid-feedback">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                            <div class="form-group">

                                {!! Form::label('twitter', 'Twitter') !!}
                                {!! Form::url('twitter', null, ['class' => 'form-control'  . ($errors->has('twitter') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la dirección Twitter']) !!}

                                @error('twitter')

                                    <span class="invalid-feedback">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                            <div class="form-group">

                                {!! Form::label('instagram', 'Instagram') !!}
                                {!! Form::url('instagram', null, ['class' => 'form-control'  . ($errors->has('instagram') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la dirección Instagram']) !!}

                                @error('instagram')

                                    <span class="invalid-feedback">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                            <div class="form-group">

                                {!! Form::label('maps', 'Google Maps') !!}
                                {!! Form::url('maps', null, ['class' => 'form-control'  . ($errors->has('maps') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la dirección Google Maps']) !!}

                                @error('maps')

                                    <span class="invalid-feedback">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                        </div>

                    </fieldset>

                </div>

            </div>

            @foreach($fotos as $foto)

                <input type="hidden" class="galeria" value="{{ $foto->url }}">

            @endforeach

            <input type="hidden" id="uuid", value="{{ $establecimiento->uuid }}">

            {!! Form::submit('Actualizar Establecimiento', ['class' => 'btn btn-primary mt-4 w-25 float-right']) !!}

            {!! Form::close() !!}

        </div>

    </div>
@stop

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />

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

@endsection

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js" integrity="sha512-8l10HpXwk93V4i9Sm38Y1F3H4KJlarwdLndY9S5v+hSAODWMx3QcAVECA23NTMKPtDOi53VFfhIuSsBjjfNGnA==" crossorigin="anonymous" defer></script>

    <script>

        $(document).ready( function() {

            $("#nombre").stringToSlug({

                setEvents: 'keyup keydown blur',

                getPut: '#slug',

                space: '-'

            });

            /* Cambiar imagen principal */
            document.getElementById('file').addEventListener('change', cambiarImagenPrincipal);

            function cambiarImagenPrincipal(e){

                var file = e.target.files[0];

                var reader = new FileReader();

                reader.onload = (e) => {
                    document.getElementById('imagen-principal').setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(file);
            }

            /* Opciones Premium */
            if ($('#premium').val() == 1){
                $('#box').attr('checked','checked')
                $('.div-premium').removeClass('d-none')
            }

            $('#box').on('change', function(){
                if (this.checked) {
                    $('.div-premium').removeClass('d-none')
                    $("#premium").attr('value', 1);
                }else if(!this.checked){
                    $('.div-premium').addClass('d-none')
                    $('#url').val(null);
                    $('#facebook').val(null);
                    $('#twitter').val(null);
                    $('#instagram').val(null);
                    $('#maps').val(null);
                    $("#premium").attr('value', 0);
                }
            })

        });

        document.addEventListener('DOMContentLoaded', () => {

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

        });

        ClassicEditor
            .create( document.querySelector( '#descripcion' ) )
            .catch( error => {
                console.error( error );
        } );

    </script>

@endsection
