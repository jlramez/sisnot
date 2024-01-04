<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <script>
        baseURL={!! json_encode(url('/')) !!}
    </script>    
    @livewireStyles
</head>
<body>
    <div id="app">
        <div  align="center">
            <img name="index_r1_c1" src="header/header_2.png" width="1960" height="200" border="0" alt="">
          </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					@auth()
                    @role(['admin','instructor','actuario','magistrado','coordinador'])
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        Agenda
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a href="{{ url('/evento/'.auth()->user()->id) }}" class="dropdown-item"> <i class="fa fa-calendar"></i>  {{auth()->user()->name}} </a>
                        </ul>
                    </div>
                    @endrole
                    <ul class="navbar-nav mr-auto">
						<!--Nav Bar Hooks - Do not delete!!-->
                        @role('admin')
                        <li class="nav-item">
                            <a href="{{ url('/parts') }}" class="nav-link"><i class="fa-solid fa-puzzle-piece"></i> Parts</a> 
                        </li>
                        @endrole
                        @role(['admin'])
						<li class="nav-item">
                            <a href="{{ url('/tipoods') }}" class="nav-link"><i class="fas fa-wrench"></i> Tipo expediente</a> 
                        </li>
                        @endrole
                        @role(['admin'])
						<li class="nav-item">
                            <a href="{{ url('/consultas') }}" class="nav-link"><i class="fa-solid fa-magnifying-glass"></i> Consultas</a> 
                        </li>
                        @endrole
                        @role(['admin'])
                            <li class="nav-item">
                                <a href="{{ url('/users') }}" class="nav-link"><i class="fas fa-users"></i> Usuarios</a> 
                            </li>
                        @endrole
                        @role(['admin'])
						<li class="nav-item">
                            <a href="{{ url('/roles') }}" class="nav-link"><i class="fa-solid fa-user-lock"></i> Roles</a> 
                        </li>
                        @endrole
                        @role(['admin'])
						<li class="nav-item">
                            <a href="{{ url('/permissions') }}" class="nav-link"><i class="fa-solid fa-lock"></i> Permisos</a> 
                        </li>
                        @endrole
                        @role(['admin','coordinador'])
						<li class="nav-item">
                            <a href="{{ url('/actuaciones') }}" class="nav-link"><i class="fa-solid fa-chart-line"></i> Actuaciones</a> 
                        </li>
                        @endrole
                        @role(['admin'])
						<li class="nav-item">
                            <a href="{{ url('/ponencias') }}" class="nav-link"><i class="fa-solid fa-briefcase"></i> Ponencias</a> 
                        </li>
                        @endrole
                        @role(['admin','coordinador'])
						<li class="nav-item">
                            <a href="{{ url('/actuarios') }}" class="nav-link"><i class="fa-solid fa-hammer"></i> Actuarios</a> 
                        </li>
                        @endrole
                        @role(['admin','coordinador','actuario','instructor'])
						<li class="nav-item">
                            <a href="{{ url('/expedientes') }}" class="nav-link"><i class="fa-solid fa-folder"></i> Expedientes</a> 
                        </li>
                        @endrole
                        @role(['admin','coordinador'])
						<li class="nav-item">
                            <a href="{{ url('/estados') }}" class="nav-link"><i class="fa-solid fa-asterisk"></i> Estados</a> 
                        </li>
                        @endrole
                        @role(['admin','coordinador'])
						<li class="nav-item">
                            <a href="{{ url('/tipos') }}" class="nav-link"><i class="fa-solid fa-microchip"></i> Tipos de proceso</a> 
                        </li>
                        @endrole
                    </ul>
					@endauth()

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
    @livewireScripts
    <script type="module">
    
        const addModal = new bootstrap.Modal('#createDataModal');
        const editModal = new bootstrap.Modal('#updateDataModal');
        const commentModal = new bootstrap.Modal('#addcommentModal');
        const addNotModal = new bootstrap.Modal('#addnotificationModal');
        const evento = new bootstrap.Modal('#evento');
        window.addEventListener('closeModal', () => {
           addModal.hide();
           editModal.hide();
           commentModal.hide();
           addNotModal.hide();
           evento.hide();
           
        })
    </script>
    
</body>
</html>