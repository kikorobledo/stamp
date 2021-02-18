@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')
    <h1>Crear Cupon</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">

            {!! Form::open(['route' => 'admin.cupones.store','files' => true]) !!}

                <div class="row">

                    <div class="col-12 col-md-6">

                        <div class="form-group">

                            {!! Form::label('establecimiento_id', 'Establecimiento') !!}
                            {!! Form::select('establecimiento_id', $establecimientos, null, ['class' => 'form-control' . ($errors->has('establecimiento_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un establecimiento']) !!}

                            @error('establecimiento_id')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('nombre', 'Nombre') !!}

                            {!! Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del cupón']) !!}

                            @error('nombre')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('slug', 'Slug') !!}

                            {!! Form::text('slug', null, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el slug del cupón', 'readonly']) !!}

                            @error('slug')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('precio', 'Precio') !!}

                            {!! Form::number('precio', null, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el precio del cupón', 'min' => '0']) !!}

                            @error('precio')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('fecha_de_vencimiento', 'Fecha De Vencimiento') !!}
                            {!! Form::date('fecha_de_vencimiento', null, ['class' => 'form-control' . ($errors->has('fecha_de_vencimiento') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el precio del cupón', 'min' => '0']) !!}

                            @error('fecha_de_vencimiento')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                        <div class="form-group">

                            {!! Form::label('codigos', 'Cantidad De Codigos') !!}

                            {!! Form::number('codigos', null, ['class' => 'form-control' . ($errors->has('codigos') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la cantidad de códigos', 'min' => '0']) !!}

                            @error('codigos')

                                <span class="text-danger">{{ $message }}</span>

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

                            {!! Form::label('estado', 'Estado') !!}
                            {!! Form::select('estado', ['activo' => 'Activo','eliminado' => 'Eliminado','revision' => 'Revisión', 'expirado' => 'Expriado'], null, ['class' => 'form-control'  . ($errors->has('estado') ? ' is-invalid' : ''),'placeholder' => 'Selecciona una categoría']) !!}

                            @error('estado')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                    </div>

                    <div class="col-12 col-md-6">

                        <div class="form-group">

                            {!! Form::label('file', 'Imágen Principal') !!}
                            {!! Form::file('file', ['class' => 'form-control-file' . ($errors->has('file') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona tu imágen']) !!}

                            @error('user_id')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <div class="col">

                            <img id="imagen-principal" class="" style="width:60%;" src="{{ asset('storage/img/logo2.png') }}" alt="">

                        </div>

                    </div>

                </div>

                <div class="text-center">

                    {!! Form::submit('Crear cupón', ['class' => 'btn btn-primary  w-25']) !!}

                </div>

            {!! Form::close() !!}

        </div>

    </div>

@stop

@section('css')

    <style>

        .ck-file-dialog-button{
            display:none;
        }

    </style>

@endsection

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

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

        });

        ClassicEditor
        .create( document.querySelector( '#descripcion' ) )
        .catch( error => {
            console.error( error );
        } );

    </script>

@endsection
