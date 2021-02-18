@extends('adminlte::page')

@section('title', 'Stamp')

@section('content_header')

    <a class="btn btn-sm btn-info float-right" href="{{ route('admin.cupones.create')}}">Agregar nuevo cupon</a>

    <h1>Lista de Cupones</h1>

@stop

@section('content')

    @if(session('info'))

        <div class="alert alert-success">

            <strong>{{ session('info') }}</strong>

        </div>

    @endif

    <div class="card">

        <div class="card-body table-responsive">

            <table class="table table-striped table-sm text-center" id="table">

                <thead class="thead-light">

                    <tr>
                        <th>#</th>
                        <th>Imágen</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Establecimiento</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Códigos</th>
                        <th>Estado</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Registro</th>
                        <th>Actualizado</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

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

    <script type="text/javascript">

        function htmlDecode(data){
            var txt=document.createElement('textarea');
            txt.innerHTML=data;
            return txt.value
        }

    </script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js" defer></script>

    <script>

        $(document).ready(function() {

            let t = $('#table').DataTable({
                responsive:true,
                autoWidth:false,
                "language":{
                    "decimal":        "",
                    "emptyTable":     "No hay datos disponibles",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered":   "(Filtrado de _MAX_ total de registros)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "search":         "Buscar:",
                    "zeroRecords":    "No se encotraron resultados",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                },
                "ajax":"{{ route('datatable.cupones') }}",
                "columns":[
                    {data: null},
                    {data: 'imagen'},
                    {data: 'nombre'},
                    {data: 'usuario'},
                    {data: 'establecimiento'},
                    {data: 'categoria'},
                    {data: 'precio'},
                    {data: 'CantidadCodigos'},
                    {data: 'estado'},
                    {data: 'fecha_de_vencimiento'},
                    {data: 'created_at'},
                    {data: 'updated_at'},
                    {data: "actions",
                        render: function(data){
                            return htmlDecode(data);
                        }
                    }
                ]
            });

            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();

            /* Borrar Etiqueta  */
            $('body').on("click", '.eliminar',function(e){
                e.preventDefault();

                document.querySelectorAll(".tokens").forEach(t => {
                    t.value = $("meta[name='csrf-token']").attr("content");
                });

                Swal.fire({
                    title: '¿Esta seguro que desea borrar el cupón?',
                    text: "¡No se podra volver a recuperar la información!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).unbind('submit').submit();
                            console.log(e)
                            e.currentTarget.form.submit();
                        }
                    })
            });

        } );
    </script>
@stop
