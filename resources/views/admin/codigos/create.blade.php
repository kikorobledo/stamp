@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')
    <h1>Crear Código</h1>
@stop

@section('content')

<div class="card">

    <div class="row justify-content-center">

        <div class="col-md-4 col-12">

            <div class="card-body">

                {!! Form::open(['route' => 'admin.codigos.store']) !!}

                    @include('admin.codigos.partials.form')

                    {!! Form::submit('Crear código', ['class' => 'btn btn-primary btn-block']) !!}

                {!! Form::close() !!}

            </div>

        </div>

    </div>

</div>

@stop
