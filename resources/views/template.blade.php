<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passion Japon</title>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Calligraffitti&family=Merienda&family=Sawarabi+Mincho&display=swap" rel="stylesheet">

    <!-- MD BOOTSTRAP -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/css/mdb.min.css" rel="stylesheet">


    <!-- CALENDAR -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/jquery-ui.min.css" integrity="sha256-cGh5mDFMJ5QuokG76ZKcBaytEHTcHJOiTXhyxwokExk=" crossorigin="anonymous" /> --}}
    <link rel="stylesheet" href="{{ asset('css/blitzer.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/dateTimePicker.css') }}" type="text/css">

    <!-- ON / OFF -->
    <link rel="stylesheet" href="{{ asset('css/on-off.css') }}" type="text/css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>
<body>
    <!-- NAVBAR -->

    <div id="menu"></div>

    <nav class="navbar navbar-expand-md sticky-top">
        <a class="navbar-brand" href="{{ route('home') }}"><span>JAPAN</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
            <div class="animated-icon"><span></span><span></span><span></span></div>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
            <ul class="nav nav-pills navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('ideas.index') }}">Idées</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('articles.index') }}">Articles</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('travels.index') }}">Circuits</a></li>
            </ul>
        </div>

        @if (Route::has('login'))
            <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
                <ul class="nav nav-pills navbar-nav">
                    @auth
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span>{{ Auth::user()->pseudo }}</span>
                                <img class="avatar" src="{{ asset('uploads/users/' . Auth::user()->id . '/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}"/>
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                @if ( Auth::user()->role == 1 )
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Tableau de bord</a>
                                    <a class="dropdown-item" href="{{ route('moderation') }}">Modération</a>
                                    <a class="dropdown-item" href="{{ route('media.create') }}">Galerie</a>
                                @endif
                                
                                <a class="dropdown-item" href="{{ route('profile') }}">Profil</a>
                                <a class="dropdown-item" href="{{ route('comments') }}">Commentaires</a>
                                <a class="dropdown-item" href="{{ route('commands') }}">Commandes</a>
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Déconnexion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Inscription</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        @endif
    </nav>

    
    <div class="container-fluid">
        @yield('content')
    </div>


    <!-- FOOTER -->

    <footer>
        <a class="fas fa-chevron-up" href="#menu"></a>
        <h3>© 2020 Passion <span class="title-japon">Japon</span><span class="title-point"></span></h3>
    </footer>
    


    <!-- SCRIPT -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/js/mdb.min.js"></script>
        
        <script   src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"   integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="   crossorigin="anonymous"></script>

        <script type="text/javascript" src="{{ asset('js/datepicker-fr.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dateTimePicker.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
        
</body>
</html>