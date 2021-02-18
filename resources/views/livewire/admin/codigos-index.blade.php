<div class="card">

    <div class="card-header">

        <input type="text" class="form-control" placeholder="Ingrese el nombre del cupon" wire:model="search">
    </div>

    @if($codigos->count())

        <div class="card-body">

            <table class="table table-stripe table-responsive">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>CÓDIGO</th>
                        <th>CUPÓN</th>
                        <th>CANJEADO EL</th>
                        <th>CANJEADO POR</th>
                        <th>FECHA DE REGISTRO</th>
                        <th>ÚLTIMA ACTUALIZACION</th>
                        <th></th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($codigos as $codigo)

                        <tr>
                            <td>{{ $codigo->id }}</td>
                            <td>{{ $codigo->codigo }}</td>
                            <td>{{ $codigo->cupon->nombre }}</td>
                            <td>{{ $codigo->canjeado_el }}</td>
                            <td>{{ $codigo->canjeado_por }}</td>
                            <td>{{ $codigo->created_at }}</td>
                            <td>{{ $codigo->updated_at }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.codigos.edit', $codigo) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.codigos.destroy', $codigo)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>

                                </form>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="card-footer ">

            {{ $codigos->onEachSide(1)->links() }}

        </div>

    @else

        <div class="card-body w-100">

            <strong >No hay ningún registro...</strong>

        </div>

    @endif

</div>
