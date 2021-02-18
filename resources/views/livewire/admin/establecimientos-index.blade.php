<div class="card">

    <div class="card-header">

        <input type="text" class="form-control" placeholder="Ingrese el nombre del establecimiento" wire:model="search">

    </div>

    @if($establecimientos->count())

        <div class="card-body">

            <table class="table table-stripe">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>USUARIO</th>
                        <th>CATEGORÍA</th>
                        <th>TELÉFONO</th>
                        <th>URL</th>
                        <th></th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($establecimientos as $establecimiento)

                        <tr>
                            <td>{{ $establecimiento->id }}</td>
                            <td>{{ $establecimiento->nombre }}</td>
                            <td>{{ $establecimiento->usuario->name }}</td>
                            <td>{{ $establecimiento->category->nombre }}</td>
                            <td>{{ $establecimiento->telefono }}</td>
                            <td>
                                <a href="{{ $establecimiento->url }}">{{ $establecimiento->url }}</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.establecimientos.edit', $establecimiento) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.establecimientos.destroy', $establecimiento)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">Elimina</button>

                                </form>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="card-footer w-100 mx-auto">

            {{ $establecimientos->links() }}

        </div>

    @else

        <div class="card-body">

            <strong >No hay ningún registro...</strong>

        </div>

    @endif

</div>
