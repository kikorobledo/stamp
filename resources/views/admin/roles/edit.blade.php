@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')
    <h1>Editar Role</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">

            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' =>  'PUT']) !!}

                @include('admin.roles.partials.form')

                {!! Form::submit('Actualizar Role', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>

    </div>

@stop
