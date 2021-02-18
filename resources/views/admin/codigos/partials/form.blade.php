<div class="form-group">

    {!! Form::label('cupon_id', 'Cupon') !!}
    {!! Form::select('cupon_id', $cupones, null, ['class' => 'form-control' . ($errors->has('cupon_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un cupón']) !!}

    @error('cupon_id')

        <span class="invalid-feedback">

            <strong>{{ $message }}</strong>

        </span>

    @enderror

</div>

<div class="form-group">

    {!! Form::label('codigo', 'Código') !!}

    {!! Form::text('codigo', null, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el código del cupón']) !!}

    @error('codigo')

        <span class="text-danger">{{ $message }}</span>

    @enderror

</div>
