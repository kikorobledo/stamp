@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')

    <h1>Editar Comentario</h1>

@stop

@section('content')

    <div class="card">

        <div class="row justify-content-center">

            <div class="col-md-6 col-12">

                <div class="card-body">

                    {!! Form::model($comentario, ['route' => ['admin.comentarios.update', $comentario], 'method' => 'PUT']) !!}

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

                            {!! Form::label('contenido', 'Descripción') !!}
                            {!! Form::textarea('contenido', null, ['class' =>'form-control'  . ($errors->has('contenido') ? ' is-invalid' : '')]) !!}

                            @error('contenido')

                                <span class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                        <input type="hidden" name="user_id" value="{{ $comentario->user_id }}">

                        {!! Form::submit('Actualizar comentario', ['class' => 'btn btn-primary btn-block']) !!}

                    {!! Form::close() !!}

                </div>
            </div>

        </div>

    </div>

@stop
