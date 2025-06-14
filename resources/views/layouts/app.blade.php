<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title') </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <!-- Reception dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Réception
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('prevision.index')}}">Prévision des Récoltes</a></li>
                                <li><a class="dropdown-item" href="#">Historique des Récoltes</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('reception.index')}}">Suivi de la Réception</a></li>
                                <li><a class="dropdown-item" href="{{route('retour.index')}}">Suivi des Retours</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('ecart.index')}}">Suivi des Ecarts</a></li>
                                <li><a class="dropdown-item" href="{{route('caisserie.index')}}">Mouvement de Caisse</a></li>
                            </ul>
                        </li>
                        <!-- Production dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Production
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('commande.index')}}">Suivi des Commandes</a></li>
                                <li><a class="dropdown-item" href="#">Prévision des besoins en articles</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('colisage.index')}}">Fabrication / Colisage</a></li>
                                <li><a class="dropdown-item" href="{{route('palette.index')}}">Suivi des Palettes NA</a></li>
                                <li><a class="dropdown-item" href="{{route('depart.index')}}">Suivi des Départs</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Trace Versement</a></li>
                                <li><a class="dropdown-item" href="#">Pal-Box</a></li>
                            </ul>
                        </li>

                        <!-- Gestion du stock dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestion du stock
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Etat du Stock</a></li>
                                <li><a class="dropdown-item" href="{{route('livraison.index')}}">Suivi des achats</a></li>
                                <li><a class="dropdown-item" href="{{route('sortie.index')}}">Suivi des retours</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('approvisionnement.index')}}">Approvisionnement</a></li>
                                <li><a class="dropdown-item" href="#">M-A-J Stock min.</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Trace Article</a></li>
                                <li><a class="dropdown-item" href="{{route('inventaire.index')}}">Inventaire</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('facture.index')}}">Factures</a></li>
                            </ul>
                        </li>

                        <!-- Paramètres dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Paramètres
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('producteur.index')}}">Producteurs</a></li>
                                <li><a class="dropdown-item" href="{{route('ferme.index')}}">Fermes</a></li>
                                <li><a class="dropdown-item" href="{{route('serre.index')}}">Serres / Parcelles</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('culture.index')}}">Cultures</a></li>
                                <li><a class="dropdown-item" href="{{route('variete.index')}}">Variétés</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('produitfini.index')}}">Produit fini</a></li>
                                <li><a class="dropdown-item" href="{{route('coloration.index')}}">Coloration</a></li>
                                <li><a class="dropdown-item" href="{{route('calibre.index')}}">Calibres</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('groupedarticle.index')}}">Groupe d'articles</a></li>
                                <li><a class="dropdown-item" href="{{route('article.index')}}">Articles d'emballage.</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('fournisseur.index')}}">Fournisseurs</a></li>

                            </ul>
                        </li>


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
</body>
</html>
