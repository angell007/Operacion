<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ])!!};
    </script>

    <title>Operación Sistemica</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Operación Sistemica
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        <li class="{{ActiveMenu ('login') }}"><a href="{{ route('login') }}">Login</a></li>
                        <li class="{{ActiveMenu ('register') }}"><a href="{{ route('register') }}">Register</a></li>
                        @else

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false" aria-haspopup="true" v-pre>
                                Gestion <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('estado.index') }}">
                                        <span class="material-icons"> widgets </span>
                                        estados de pedido
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('modo.index') }}">
                                        <span class="material-icons"> widgets </span>
                                        modos de servicio
                                    </a>
                                </li>


                                <li>
                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('razon.index') }}">
                                        <span class="material-icons"> widgets </span>
                                        razones
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('tipo.index') }}">
                                        <span class="material-icons"> widgets </span>
                                        tipos
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false" aria-haspopup="true" v-pre>
                                Administracion <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">


                                <li>
                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('cargo.index') }}">
                                        <span class="material-icons"> widgets </span>
                                        cargo
                                    </a>
                                </li>


                                <li>
                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('proveedor.index') }}">
                                        <span class="material-icons"> widgets </span>
                                        proveedores
                                    </a>
                                </li>


                                <li>
                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('producto.index') }}">
                                        <span class="material-icons"> widgets </span>
                                        productos
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false" aria-haspopup="true" v-pre>
                                Servicios <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('servicio.create') }}">
                                        <span class="material-icons"> widgets </span>
                                        Add Service
                                    </a>

                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('tecnico') }}">
                                        <span class="material-icons"> widgets </span>
                                        Add Service technical
                                    </a>

                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('servicio.index') }}">
                                        <span class="material-icons"> widgets </span>
                                        Services
                                    </a>
                                </li>

                            </ul>
                        </li>

                        {{-- <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                                    Articulos <span class="caret"></span>
                                                </a>
                
                                                <ul class="dropdown-menu">
                                                    <li>
                                                            <a class="dropdown-item " style="font-size: 15px;" title="Crear" href="{{  route('articulo.create') }}">
                        <span class="material-icons"> widgets </span>
                        add articulo
                        </a>

                        <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                            href="{{  route('articulo.index') }}">
                            <span class="material-icons"> widgets </span>
                            articulo
                        </a>
                        </li>

                    </ul>
                    </li> --}}

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                            aria-haspopup="true" v-pre>
                            Clientes <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                    href="{{  route('cliente.index') }}">
                                    <span class="material-icons"> widgets </span>
                                    Gestiona
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                                aria-haspopup="true" v-pre>
                                Articulos <span class="caret"></span>
                            </a>
    
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item " style="font-size: 15px;" title="Crear"
                                        href="{{  route('articulo.index') }}">
                                        <span class="material-icons"> widgets </span>
                                        Gestiona
                                    </a>
                                </li>
    
                            </ul>
                        </li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                            aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                    </li>


                    </ul>
                    @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <?php Function ActiveMenu($url)
    {
    return request()->is($url)? 'active':'' ;
    }
    ?>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>