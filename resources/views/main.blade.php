@extends ('layouts.app')

@section ('title')
    Main
@endsection

@section ('content')
    @foreach ($allTweets as $tweet)
        <a href="tweets/{{ $tweet->id }}"><h1>{{ $tweet->text }}</h1></a>
        <p>{{ $tweet->created_at }} by <a href="users/{{ $tweet->user->id }}">{{ $tweet->user->name }}</a></p><hr>
    @endforeach
@endsection
