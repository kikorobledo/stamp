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

            <legend class="text-primary">Imagenes</legend>

            <div class="row">

                <div class="col">

                    <div class="form-group">

                        {!! Form::label('file', 'Imagen Principal') !!}
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

                        <img id="imagen-principal" class="" style="width:60%;" src="{{ asset('storage/'. $establecimiento->imagen->url) }}" alt="">

                    @else

                        <img id="imagen-principal" class="" style="width:60%;" src="{{ asset('storage/img/logo2.png') }}" alt="">

                    @endif

                </div>

            </div>

            <div class="form-control">

                <label for="imagenes">Imagenes secundarias</label>

                <div class="dropzone form-control" id="dropzone"></div>

            </div>

        </fieldset>

    </div>

    <div class="col-12 col-md-6">

        <fieldset class="border p-4 mt-5">

            <legend  class="text-primary">Información Establecimiento</legend>

            <div class="form-group">

                {!! Form::label('telefono', 'Telefono') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control'  . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el teléfono del establecimiento']) !!}

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
                {!! Form::time('apertura', null, ['class' =>'form-control'  . ($errors->has('apertura') ? ' is-invalid' : '')]) !!}

                @error('apertura')

                    <span class="invalid-feedback">

                        <strong>{{ $message }}</strong>

                    </span>

                @enderror

            </div>

            <div class="form-group">

                {!! Form::label('cierre', 'Hora de cierre') !!}
                {!! Form::time('cierre', null, ['class' =>'form-control'  . ($errors->has('cierre') ? ' is-invalid' : '')]) !!}

                @error('cierre')

                    <span class="invalid-feedback">

                        <strong>{{ $message }}</strong>

                    </span>

                @enderror

            </div>

        </fieldset>

    </div>

    <div class="col-12 col-md-6">

        <fieldset class="border p-4 mt-5">

            <legend class="text-primary">Dirección</legend>

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

            <div class="form-group">

                {!! Form::label('url', 'URL') !!}
                {!! Form::text('url', null, ['class' => 'form-control'  . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la dirección electrónica del establecimiento']) !!}

                @error('url')

                    <span class="invalid-feedback">

                        <strong>{{ $message }}</strong>

                    </span>

                @enderror

            </div>

        </fieldset>

    </div>

</div>
