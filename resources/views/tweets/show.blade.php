@extends ('layouts.app')

@section ('title')
	Show tweet
@endsection

@section ('content')
	<h1>{{ $tweet->text }}</h1>
	<p>Tweeted at {{ $tweet->created_at }} by <a href="../users/{{ $tweet->user->id }}">{{ $tweet->user->name }}</a></p><hr>
	@if(Auth::user())
		<form method="POST" action="/comments">
			{{ csrf_field() }}
			<div class="form-group">
				<button class="addComment">Leave a comment</button><br>
				<div class="commentText">
					<textarea class="form-control" rows="5" name="text" id="text" required></textarea>
					<input class="btn btn-primary btn-block" type="submit" value="Send">
					<input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
				</div>
			</div>
		</form>
	@endif
		@foreach($comments as $comment)
			<h4>{{ $comment->text }}</h4>
			<h5>Added by <a href="../users/{{ $comment->user->id }}">{{ $comment->user->name }}</a> on {{ $comment->created_at }}</h5>
		@endforeach
@endsection

<script
      src="{{ URL::asset('https://code.jquery.com/jquery-3.2.1.min.js') }}"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
@include('layouts.comments')