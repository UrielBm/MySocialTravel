<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Uriel Benítez Medina" />
    <meta
      name="description"
      content="Web app de viajes, ven y publica tu viaje, que haces en redes y tus mejores fotos del viaje todo asociado a tu perfil"
    />
    <!--OG TAGS -->
    <meta property="og:title" content="Social Travel." />
    <meta property="og:description" content="publica tus mejores viajes,¿qué hiciste cómo lo hiciste? las fotos del viaje cuanto duro crea tu perfil y comparte al mundo tu forma de viajar" />
    <meta property="og:image" content="https://images.unsplash.com/photo-1532105111962-e23707867985?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="travel" />
    <meta propertty="og:locale" content="es_MX" />
    <meta property="og:url" content="http://mysocialtravel.ga/" />
    <meta property="og:type" content="website" />
    <!--Twitter OG TAGS-->
    <meta property="twitter:side" content="@CouthUriel" />
    <meta property="twitter:creator" content="@CouthUriel" />
    <!--END Twitter OG TAGS-->
    <!--End OG TAGS-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- ico page -->
    <link rel="icon" href="{{asset('images/favico.ico')}}" type="image/x-icon" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @yield('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Pwa Code -->
    @laravelPWA
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="outline: none;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

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
                                   <img src="/storage/{{Auth::user()->perfil->avatar ? Auth::user()->perfil->avatar  : "/default/usuario.png"}}" class="rounded-circle" style="width: 2.5rem" /> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('perfil.show',["perfil" => Auth::user()->id])}}">Mi perfil</a>
                                    <a class="dropdown-item" href="{{route('viaje.index')}}">Mis viajes</a>
                                    <a class="dropdown-item" href="{{route('viajes.me_gustan')}}">Viajes que te gustan</a>
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
        <nav class="navbar navbar-expand-md navbar-light categorias-bg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#categorias" aria-controls="categorias" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    Categorias
                </button>
                <div class="navbar-collapse collapse" id="categorias">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav w-100 d-flex justify-content-between">
                        @foreach ($categorias as $categoria)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categorias.show', ['categoria' => $categoria->id ]) }}">
                               {{ $categoria->nombre }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
        @yield("hero")
        <main class="content">
            @yield('titleSection')
            <section>
                <div class="py-4">
                    @yield('actionButtons')
                </div>
            </section>
            <section>
                @yield('content')
            </section>
        </main>
    </div>
</body>
@stack('scripts')
</html>
