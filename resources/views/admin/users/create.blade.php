@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')

<div class="card">

    <div class="row justify-content-center">

        <div class="col-md-4 col-12">

        <div class="card-body">

            {!! Form::open(['route' => 'admin.users.store']) !!}

                <div class="form-group">

                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}

                    @error('name')

                        <span class="invalid-feedback">

                            <strong>{{ $message }}</strong>

                        </span>

                    @enderror

                </div>

                <div class="form-group">

                    {!! Form::label('email', 'Correo') !!}
                    {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}

                    @error('email')

                        <span class="invalid-feedback">

                            <strong>{{ $message }}</strong>

                        </span>

                    @enderror

                </div>

                <div class="form-group">

                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class'=> 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) !!}

                    @error('password')

                        <span class="invalid-feedback">

                            <strong>{{ $message }}</strong>

                        </span>

                    @enderror

                </div>

                <div class="form-group">


                    {!! Form::label('password_confirmation', 'Repita el Password') !!}
                    {!! Form::password('password_confirmation', ['class'=> 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : '')]) !!}

                    @error('password_confirmation')

                        <span class="invalid-feedback">

                            <strong>{{ $message }}</strong>

                        </span>

                    @enderror

                </div>

                <div class="form-group">

                    {!! Form::label('roles', 'Roles') !!}

                    @error('roles')

                        <br>

                        <small class="text-danger">

                            <strong>{{ $message }}</strong>

                        </small>

                        <br>

                    @enderror

                    @foreach($roles as $role)

                        <div>
                            <label>

                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-2']) !!}
                                {{ $role->name }}

                            </label>

                        </div>

                    @endforeach

                </div>

                {!! Form::submit('Crear Usuario', ['class' => 'btn btn-primary btn-block']) !!}

            {!! Form::close() !!}

        </div>

    </div>

</div>

@stop
