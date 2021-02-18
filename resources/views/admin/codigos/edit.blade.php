@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')
    <h1>Editar Código</h1>
@stop

@section('content')

<div class="card">

    <div class="row justify-content-center">

        <div class="col-md-4 col-12">

            <div class="card-body">

                {!! Form::model($codigo, ['route' => ['admin.codigos.update', $codigo], 'method' => 'PUT']) !!}

                    @include('admin.codigos.partials.form')

                    {!! Form::submit('Actualizar código', ['class' => 'btn btn-primary btn-block']) !!}

                {!! Form::close() !!}

            </div>

        </div>

    </div>

</div>

@stop
