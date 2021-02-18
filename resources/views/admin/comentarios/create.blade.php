@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')

    <h1>Crear Comentario</h1>

@stop

@section('content')

    <div class="card">

        <div class="row justify-content-center">

            <div class="col-md-6 col-12">

                <div class="card-body">

                    {!! Form::open(['route' => 'admin.comentarios.store']) !!}

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

                            {!! Form::label('descripcion', 'Descripción') !!}
                            {!! Form::textarea('descripcion', null, ['class' =>'form-control'  . ($errors->has('descripcion') ? ' is-invalid' : '')]) !!}

                            @error('descripcion')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        {!! Form::submit('Crear comentario', ['class' => 'btn btn-primary btn-block']) !!}

                    {!! Form::close() !!}

                </div>
            </div>

        </div>

    </div>

@stop
