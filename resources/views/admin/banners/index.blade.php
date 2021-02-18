@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')

    <h1>Lista de Banners</h1>

@stop

@section('content')

    @if(session('info'))

        <div class="alert alert-success" role="alert">

            <strong>{{ session('info') }}</strong>

        </div>

    @endif

    <div class="card">

        <div class="card-body table-responsive">

            <table class="table table-striped table-sm text-center" id="table">

                <thead class="thead-light">

                    <tr>
                        <th>Imágen</th>
                        <th>Nombre</th>
                        <th>Creada</th>
                        <th>Actualizada</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($banners as $banner)

                        <tr>
                            <td>
                                @if($banner->imagen)

                                    <img class="" style="height:40px;" src="/storage/{{ $banner->imagen->url }}" alt="">

                                @else

                                    <img class="rounded-circle" style="width:40px; height:40px;" src="{{ asset('storage/img/logo2.png') }}" alt="">

                                @endif
                            </td>
                            <td>{{ $banner->nombre }}</td>
                            <td>{{ $banner->created_at }}</td>
                            <td>{{ $banner->updated_at }}</td>
                            <td><a href="{{route('admin.banners.edit', $banner) }}" class='btn btn-sm btn-primary mr-2' title='Editar Banner'><i class='fas fa-edit'></i></a></td>
                        </tr>

                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@stop

@section('js')

    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js" defer></script>
@stop
