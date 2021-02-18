@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')
    <h1>Editar Etiqueta</h1>
@stop

@section('content')

<div class="card">

    <div class="row justify-content-center">

        <div class="col-md-4 col-12">

        <div class="card-body">

            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'PUT']) !!}

                <div class="form-group">

                    {!! Form::label('nombre', 'Nombre') !!}

                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta']) !!}

                    @error('nombre')

                        <span class="text-danger">{{ $message }}</span>

                    @enderror

                </div>

                <div class="form-group">

                    {!! Form::label('slug', 'Slug') !!}

                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la etiqueta', 'readonly']) !!}

                    @error('slug')

                        <span class="text-danger">{{ $message }}</span>

                    @enderror

                </div>

                {!! Form::submit('Actualizar etiqueta', ['class' => 'btn btn-primary btn-block']) !!}

            {!! Form::close() !!}

        </div>

    </div>

</div>

@stop

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>

        $(document).ready( function() {

            $("#nombre").stringToSlug({

                setEvents: 'keyup keydown blur',

                getPut: '#slug',

                space: '-'

            });

        });

    </script>

@endsection
