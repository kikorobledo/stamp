@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')

    <h1>Editar Banner</h1>

@stop

@section('content')

    <div class="card">

        <div class="row justify-content-center">

            <div class="col-md-4 col-12">

                <div class="card-body">

                    {!! Form::model($banner, ['route' => ['admin.banners.update', $banner], 'method' => 'PUT','files' => true]) !!}

                        <div class="">

                            <div class="">

                                @if($banner->imagen)

                                    <img id="imagen-principal" class="" style="width:100%;" src="{{ asset('storage/'. $banner->imagen->url) }}" alt="Imágen banner">

                                @else

                                    <img id="imagen-principal" class="" style="width:100%;" src="{{ asset('storage/img/logo2.png') }}" alt="Imágen banner">

                                @endif

                            </div>

                            <div class="form-group">

                                {!! Form::label('file', 'Imágen Principal') !!}
                                {!! Form::file('file', ['class' => 'form-control-file' . ($errors->has('file') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona tu imágen']) !!}

                                @error('user_id')

                                    <span class="invalid-feedback">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                        </div>

                        {!! Form::submit('Actualizar banner', ['class' => 'btn btn-primary btn-block']) !!}

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div>

@stop

@section('js')

    <script>

        $(document).ready( function() {

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

    </script>

@endsection
