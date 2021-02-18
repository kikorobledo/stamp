<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('storage/img/logo2.png') }}">

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />


        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

    </head>

    <body class="font-sans antialiased">

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

            @livewire('navigation')

            <!-- Page Content -->
            <main class="pb-10">
                {{ $slot }}
            </main>



        </div>

        <footer class="flex flex-col items-center justify-between px-6 py-6  bg-gray-800 sm:flex-row static bottom-0 w-full">

            {{-- <a href="#" class="text-xl font-bold text-gray-800 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">Stamp</a> --}}
            <div class="flex -mx-2 text-white mb-5 md:mb-0">

                <img class="h-12 mr-2" src="{{ asset('storage/img/logo2.png') }}" alt="Logo">

                <a class="navbar-brand text-white text-3xl ml-3" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

            </div>

            <div class="flex flex-col text-center -mx-2 text-white mb-5 md:mb-0">

                <div class="mb-2">

                    <a href="https://www.instagram.com/stampmx_/" class="hover:text-red-300 text-4xl mr-5" title="Instagram" target="_blank"><i class="fab fa-instagram-square"></i></a>

                    <a href="https://www.facebook.com/stampmx" class="hover:text-blue-500 text-4xl mr-5" title="Facebook" target="_blank"><i class="fab fa-facebook" ></i></a>

                    <a href="https://twitter.com/Stampmx_" class="hover:text-blue-400 text-4xl mr-5" title="Twitter" target="_blank"><i class="fab fa-twitter-square"></i></a>

                    <a href="https://wa.me/524435130410" class="hover:text-green-300 text-4xl mr-5" title="Twitter" target="_blank"><i class="fab fa-whatsapp"></i></a>

                </div>

                <div>
                    <p class="py-2 text-white font-thin dark:text-white sm:py-0">© 2021 Stamp. Todos los derechos reservados.</p>
                </div>

            </div>

            <div class="flex flex-col md:text-right text-center">

                <a class="py-2 text-white font-thin dark:text-white sm:py-0" href="{{ route('aviso_de_privacidad') }}">Aviso de privacidad</a>

                <a class="py-2 text-white font-thin dark:text-white sm:py-0" href="{{ route('terminos_y_condiciones_de_uso') }}">Terminos y condiciones de uso</a>

            </div>

        </footer>

        @stack('modals')

        @livewireScripts

    </body>

</html>
