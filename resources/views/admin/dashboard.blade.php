@extends('template')

@section('content')



    <div class="ideasDashBoard">
        <h2>Idées</h2>
        <div class="row">
			@foreach($ideas as $idea)
				<div class="col-xl-4 col-md-6">
					<a href="{{ route('ideas.show', $idea->id) }}">
						<img src="{{ asset('uploads/'.$idea->image) }}" alt="{{ $idea->image }}"/>
					</a>
					<h3>{{ $idea->title }}</h3>
                    <a class="button fas fa-eye fa-lg" href="{{ route('ideas.show', $idea->id) }}"></a>
                    <a class="button" href="{{ route('ideas.edit', $idea->id) }}">Modifier</a>
                    <a class="button" href="{{ route('ideas.destroy', $idea->id) }}">Supprimer</a>
				</div>
			@endforeach
		</div>
    </div>



    <div class="articlesDashBoard">
        <h2>Articles</h2>
        @foreach($articles as $article)
            <div class="article-trailer">
                <img src="{{ asset('uploads/'.$article->image) }}" alt="{{ $article->image }}"/>
                <h3>{{ $article->title }}</h3>
                <a class="button fas fa-eye fa-lg" href="{{ route('articles.show', $article->id) }}"></a>
                @auth    
                    @if ( Auth::user()->role == 1 )
                        <a class="button" href="{{ route('articles.edit', $article->id) }}">Modifier</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="button" type="submit">Supprimer</button>
                        </form>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>






    <div class="travelsDashBoard">
        <h2>Circuits</h2>
        <div class="row">
            @foreach( $categories as $category)
                    <div class="col-lg-6">
                        <div class="cat-bubble-container">
                            <a href="{{ route('categories.show', $category->id) }}"><img src="{{ asset('uploads/'.$category->image) }}" alt="{{ $category->image }}"/></a>
                            <a class="cat-bubble" href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a>
                        </div>
                        @php
                            $travelsCat = App\Travel::where('travels.category_id', $category->id)->get();
                        @endphp
                        @foreach( $travelsCat as $travelCat )
                            @php
                                $users = App\Reaction::where('reactions.travel_id', $travelCat->id)->join('users', 'reactions.user_id', '=', 'users.id')->get();
                                $average = App\Reaction::where('reactions.travel_id', $travelCat->id)->join('users', 'reactions.user_id', '=', 'users.id')->where('users.ban', 0)->avg('note');
                                $averageNote = number_format($average, 1);
                                $nbNotes = 0;
                                foreach( $users as $user ) {
                                    if( $user->ban != 1 ){
                                        $nbNotes ++;
                                    }
                                }
                                if( $nbNotes == 0 ){
                                    $averageNote = 'X';
                                }
                            @endphp
                            <p class="travelDashBoardInfo">Du {{ $travelCat->date_start }} au {{ $travelCat->date_end }} - Note moyenne : {{ $averageNote }} ({{ $nbNotes }}) - Places vendues : à voir</p>
                        @endforeach
                    </div>
            @endforeach
        </div>

    </div>


@endsection