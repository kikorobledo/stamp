@if($foto)

    <img class="rounded-circle" style="width:40px; height:40px;" src="{!! $foto !!}" alt="">

@else

    <img class="rounded-circle" style="width:40px; height:40px;" src="{{ asset('storage/img/logo2.png') }}" alt="">

@endif

