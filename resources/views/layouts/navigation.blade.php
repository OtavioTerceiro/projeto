<nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom sticky-top navbar ">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <x-application-logo width="36" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('XML') }}
                </x-nav-link>

                <x-nav-link href="{{ route('produtos') }}" :active="request()->routeIs('produtos')">
                    {{ __('Cadastro de Produtos') }}
                </x-nav-link>

                <x-nav-link href="{{ route('dar_baixa_busca') }}" :active="request()->routeIs('dar_baixa_busca')">
                    {{ __('Baixa de Produtos') }}
                </x-nav-link>

                <x-nav-link href="{{ route('cancelar_baixa') }}" :active="request()->routeIs('cancelar_baixa')">
                    {{ __('Cancelar Baixa') }}
                </x-nav-link>

                <x-nav-link href="{{ route('listar_transacoes') }}" :active="request()->routeIs('listar_transacoes')">
                    {{ __('Listar Transações') }}
                </x-nav-link>

                <x-nav-link href="{{ route('listar') }}" :active="request()->routeIs('listar')">
                    {{ __('Listar Produtos') }}
                </x-nav-link>

                @if (auth()->user()->admin)
                    {{-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Funcionários
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Cadastrar Funcionário</a></li>
                        <li><a class="dropdown-item" href="#">Listar Funcionários</a></li>
                    </ul> --}}

                    <x-dropdown>
                        <x-slot name='trigger'>
                            {{ __('Funcionários') }}
                        </x-slot>

                        <x-slot name='content'>
                            <a class="dropdown-item" href="{{ route('register') }}">Cadastrar Funcionário</a>
                            <a class="dropdown-item" href="{{ route('listar_funcionarios') }}">Listar Funcionários</a>
                        </x-slot>
                    </x-dropdown>
                @endif
            </ul>




            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">

                <!-- Settings Dropdown -->
                @auth
                    <x-dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->name }}
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </ul>
        </div>
    </div>
</nav>
