@extends('template')

@section('content')

    <div>
        <h2>Le SHI-FU-MI</h2>
        <h3 class="mb-4 text-center">Défiez l'ordinateur</h3>
        <div class="score">
            <p class="scoreP">Victoires : 0</p>
            <p class="scoreP">Défaites : 0</p>
            <p class="scoreP">Egalités : 0</p>
        </div>
    </div>


    <div>
        <nav id="shifumiNav">
            <ul>
                <li><img class="shifumiImg" src="{{ asset('imgs/stone.svg') }}" alt="Pierre" title="stone"></li>
                <li><img class="shifumiImg" src="{{ asset('imgs/paper.svg') }}" alt="Papier" title="paper"></li>
                <li><img class="shifumiImg" src="{{ asset('imgs/scissors.svg') }}" alt="Sciseaux" title="scissors"></li>
            </ul>
        </nav>

        <section  id="shifumiSection">
            <!-- Choix de l'internaute -->
            <article></article>
            <!-- Choix de lo'rdinateur -->
            <article></article>
            <!-- Résultat -->
            <aside></aside>
        </section>
    </div>


    <div>
        <button class="shifumiButton button">Lancer la partie</button>
        <button class="shifumiButton button">Rejouer</button>
    </div>

    <script>
        var base_url = "{{ asset('/') }}";
    </script>

@endsection