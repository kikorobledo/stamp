<div>

    <div class="card">

        <div class="card-header">

            <div class="input-group w-25">

                <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-search"></i></span>

                  </div>

                <input type="text" class="form-control" placeholder="Buscar" wire:model="search">

              </div>

        </div>

        @if($tags->count())

            <div class="card-body table-responsive">

                <table class="table table-striped table-sm text-center">

                    <thead class="thead-light">

                        <tr>

                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Creada</th>
                            <th>Actualizada</th>
                            <th colspan="2">Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($tags as $tag)

                            <tr>

                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->nombre }}</td>
                                <td>{{ $tag->created_at->diffForHumans() }}</td>
                                <td>{{ $tag->updated_at->diffForHumans() }}</td>
                                <td width="10px">
                                    <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-sm btn-primary" title="Editar Etiqueta"><i class="fas fa-edit"></i></a>
                                </td>
                                <td width="10px">

                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                        @method('delete')
                                        @csrf

                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Etiqueta"><i class="fas fa-trash-alt"></i></button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            <div class="card-footer w-100 justify-content-center">

                {{ $tags->links() }}

            </div>

        @else

            <div class="card-body">

                <strong >No hay ningún registro...</strong>

            </div>

        @endif

    </div>

</div>
