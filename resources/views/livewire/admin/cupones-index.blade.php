<div class="card">

    <div class="card-header">

        <input type="text" class="form-control" placeholder="Ingrese el nombre del cupon" wire:model="search">
    </div>

    @if($cupones->count())

        <div class="card-body">

            <table class="table table-stripe table-responsive">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>USUARIO</th>
                        <th>ESTABLECIMIENTO</th>
                        <th>CATEGORÍA</th>
                        <th>PRECIO</th>
                        <th>CODIGOS</th>
                        <th>ESTADO</th>
                        <th>FECHA DE VENCIMIENTO</th>
                        <th>FECHA DE REGISTRO</th>
                        <th>ÚLTIMA ACTUALIZACION</th>
                        <th></th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($cupones as $cupon)

                        <tr>
                            <td>{{ $cupon->id }}</td>
                            <td>{{ $cupon->nombre }}</td>
                            <td>{{ $cupon->establecimiento->usuario->name }}</td>
                            <td>{{ $cupon->establecimiento->nombre }}</td>
                            <td>{{ $cupon->establecimiento->category->nombre }}</td>
                            <td>{{ $cupon->precio }}</td>
                            <td>{{ count($cupon->codigos) }}</td>
                            <td>{{ $cupon->estado }}</td>
                            <td>{{ $cupon->fecha_de_vencimiento }}</td>
                            <td>{{ $cupon->created_at }}</td>
                            <td>{{ $cupon->updated_at }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.cupones.edit', $cupon) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.cupones.destroy', $cupon)}}" method="POST">
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

            {{ $cupones->onEachSide(1)->links() }}

        </div>

    @else

        <div class="card-body w-100">

            <strong >No hay ningún registro...</strong>

        </div>

    @endif

</div>
