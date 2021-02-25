<div>

    <nav class="bg-gray-800 {{-- md:fixed --}} w-full" x-data="{open:false}">

        {{-- Menu LG --}}
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-16">

          <div class="flex items-center">

            {{-- Logo --}}
            <a href="/" class="flex-shrink-0">

              <img class="h-8 " src="{{ asset('storage/img/logo_blanco.png') }}" alt="Logo">

            </a>

            {{-- Menu LG --}}
            <div class="hidden md:block">

              <div class="ml-10 flex items-baseline space-x-4">

                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                {{-- <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a> --}}

                <div @click.away="open = false" class="relative z-40" x-data="{ open: false }">

                    <button @click="open = !open" class="text-white flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

                      <span class="">Categorías</span>

                      <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">

                      <ul class="px-8 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800 w-full ">

                        @foreach($categorias as $categoria)
                        <li>
                            <a href="{{ route('cupones.categoria', $categoria) }}" class="text-gray-600  hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium inline-block">{{ $categoria->nombre }}</a>
                        </li>
                        @endforeach

                      </ul>

                    </div>

                  </div>

              </div>

            </div>

          </div>

          @auth

            <div class="hidden md:block">

                <div class="ml-4 flex items-center md:ml-6">

                {{-- Boton notificación --}}
                <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">

                    <span class="sr-only">View notifications</span>

                    <!-- Heroicon name: bell -->
                    {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />

                    </svg> --}}

                </button>

                <!-- Profile dropdown -->
                <div class="ml-3 relative z-50" x-data="{open:false}">

                    <div>

                    <button x-on:click="open=true" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">

                        <span class="sr-only">Menu de usuario abierto</span>

                        <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="Foto de perfil">

                    </button>

                    </div>

                    <!--
                    Profile dropdown panel, show/hide based on dropdown state.

                    Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div x-show="open" x-on:click.away="open=false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">

                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Mi Perfil</a>

                        <a href="{{ route('establecimientos.mis_establecimientos') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Mis Establecimientos</a>

                        <a href="{{ route('cupones.mis_cupones') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Mis Cupones</a>

                        @if(auth()->user()->roles[0]->name == "Administrador")

                            <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>

                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" onclick="event.preventDefault();
                            this.closest('form').submit();">
                                Cerrar Sesión
                            </a>

                        </form>

                    </div>

                </div>

                </div>

            </div>

          @else

            <div class="ml-8">

                <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Iniciar Sesión</a>

                <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Registrarse</a>

            </div>

          @endauth

          <!-- Mobile menu button -->
          <div class="-mr-2 flex md:hidden">

            <button x-on:click="open=true" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">

              <span class="sr-only">Open main menu</span>
              <!--
                Heroicon name: menu

                Menu open: "hidden", Menu closed: "block"
              -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />

              </svg>
              <!--
                Heroicon name: x

                Menu open: "block", Menu closed: "hidden"
              -->
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />

              </svg>

            </button>

          </div>

        </div>

      </div>

      <!--
        Mobile menu, toggle classes based on menu state.

        Open: "block", closed: "hidden"
      -->
      <div class="md:hidden" x-show="open" x-on:click.away="open=false">

        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">

          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          {{-- <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a> --}}

          @foreach($categorias as $categoria)

            <a href="{{ route('cupones.categoria', $categoria) }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium">{{ $categoria->nombre }}</a>

          @endforeach

        </div>

        @auth

            <div class="pt-4 pb-3 border-t border-gray-700">

            <div class="flex items-center px-5">

              <div class="flex-shrink-0">

                  <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="Foto de perfil">

              </div>

              {{-- <div class="ml-3">

                <div class="text-base font-medium leading-none text-white">Tom Cook</div>

                <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>

              </div>

              <button class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">

                <span class="sr-only">View notifications</span>

                <!-- Heroicon name: bell -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">

                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />

                </svg>

              </button> --}}

            </div>

            <div class="mt-3 px-2 space-y-1">

              <a href="{{ route('profile.show') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium" role="menuitem">Mi Perfil</a>

              <a href="{{ route('establecimientos.mis_establecimientos') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium" role="menuitem">Mis Establecimientos</a>

              <a href="{{ route('cupones.mis_cupones') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium" role="menuitem">Mis Cupones</a>

              <a href="{{ route('admin.home') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium" role="menuitem">Dashboard</a>

              <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <a href="{{ route('logout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium" role="menuitem" onclick="event.preventDefault();
                  this.closest('form').submit();">
                      Cerrar Sesión
                  </a>

              </form>

            </div>

          </div>

        @endauth

      </div>

    </nav>

</div>

