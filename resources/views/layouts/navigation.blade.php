<nav x-data="{ open: false }" class="navbar-light bg-light" style="rgba(0,0,0,0.16);
-webkit-box-shadow: 2px 10px 53px -6px rgba(0,0,0,0.16);
-moz-box-shadow: 2px 10px 53px -6px rgba(0,0,0,0.16);">
    @auth
        <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        {{ __('Página inicial') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Lista de agendamentos') }}
                    </x-nav-link>
                    @can('ver-posto')
                        <x-nav-link :href="route('postos.index')" :active="request()->routeIs('postos.*')">
                            {{ __('Lista de Pontos') }}
                        </x-nav-link>
                    @endcan
                    @can('ver-lote')
                    <x-nav-link :href="route('lotes.index')" :active="request()->routeIs('lotes.*')">
                        {{ __('Lista de Lotes') }}
                    </x-nav-link>
                    @endcan
                    @can('ver-etapa')
                    <x-nav-link :href="route('etapas.index')" :active="request()->routeIs('etapas.*')">
                        {{ __('Públicos') }}
                    </x-nav-link>
                    @endcan
                    @can('ver-export')
                    <x-nav-link :href="route('export.index')" :active="request()->routeIs('export.*')">
                        {{ __('Exportar') }}
                    </x-nav-link>
                    @endcan
                    @can('ver-candidato-lote')
                    <x-nav-link :href="route('candidato.candidatoLote')" :active="request()->routeIs('candidato.*')">
                        {{ __('Lista Candidato Lote') }}
                    </x-nav-link>
                    @endcan
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Página inicial') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Lista de agendamentos') }}
            </x-responsive-nav-link>
            @can('ver-posto')
            <x-responsive-nav-link :href="route('postos.index')" :active="request()->routeIs('postos.*')">
                {{ __('Lista de Pontos') }}
            </x-responsive-nav-link>
            @endif
            @can('ver-lote')
            <x-responsive-nav-link :href="route('lotes.index')" :active="request()->routeIs('lotes.*')">
                {{ __('Lista de Lotes') }}
            </x-responsive-nav-link>
            @endif
            @can('ver-etapa')
            <x-responsive-nav-link :href="route('etapas.index')" :active="request()->routeIs('etapas.*')">
                {{ __('Públicos') }}
            </x-responsive-nav-link>
            @endif
            @can('ver-export')
            <x-responsive-nav-link :href="route('export.index')" :active="request()->routeIs('export.*')">
                {{ __('Exportar') }}
            </x-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Sair') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @endauth
</nav>
