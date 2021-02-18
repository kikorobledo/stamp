<div>

    <div class="card">

        <div class="card-header">

            <input class="form-control" placeholder="Escriba un nombre" wire:model="search" wire:keydown="limpiarPage">

        </div>

        @if($usuarios->count())

            <div class="card-body">

                <table class="table table-stripe">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FOTO</th>
                            <th>NOMBRE</th>
                            <th>CORREO</th>
                            <th>ROLE</th>
                            <th>FECHA DE REGISTRO</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($usuarios as $usuario)

                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td><img class="rounded-circle" style="width:40px;" src="{{ $usuario->profile_photo_url }}" alt=""></td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    @foreach($usuario->roles as $role)
                                            {{ $role->name }}
                                    @endforeach
                                </td>
                                <td>{{ $usuario->created_at }}</td>
                                <td width="10px">
                                    <a class="btn btn-secondary btn-sm" href="{{ route('admin.users.edit', $usuario) }}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('admin.users.destroy', $usuario)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="card-footer">

                {{ $usuarios->links() }}

            </div>

        @else

            <div class="card-body">

                <strong>No hay registros...</strong>

            </div>

        @endif

    </div>

</div>
