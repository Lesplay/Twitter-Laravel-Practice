@extends ('layouts.app')

@section ('title')
	{{ $user->name }}'s page
@endsection

@section ('content')
	<h1>{{ $user->name }}'s tweet history</h1>
	@foreach ($tweets as $tweet)
		<h3>{{ $tweet->text }}</h3>
		<p>Tweeted at {{ $tweet->created_at }}</p>
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
		<hr>
	@endforeach
@endsection
<script
      src="{{ URL::asset('https://code.jquery.com/jquery-3.2.1.min.js') }}"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
@include('layouts.comments')