<div class='d-flex justify-content-center'>

    <a href='{!! $editUrl !!}' class='btn btn-sm btn-primary mr-2' title='Editar'><i class='fas fa-edit'></i></a>

    <form action='{!! $deleteUrl !!}' method='POST'>
        <input type="hidden" name="_method" value="delete">
        <input class="tokens" type="hidden" name="_token" value="">

        <button type='submit' class='eliminar btn btn-danger btn-sm' title='Eliminar'><i class='fas fa-trash-alt'></i></button>

    </form>

</div>
