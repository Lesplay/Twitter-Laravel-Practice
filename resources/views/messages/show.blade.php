@extends ('layouts.app')

@section ('title')
	Showing your messages
@endsection

@section ('content')
	<div class="container col-md-6">
		<h1>Received messages:</h1><hr>
			@foreach($receivedMessages as $message)
				<h3>{{ $message->text }}</h3>
				<p>Sent by {{ $message->sender->name }} at {{ $message->created_at }}</p>
				<form method="POST" action="/messages">
					{{ csrf_field() }}
					<div class="form-group">
						<button class="replyBtn">Reply</button><br>
						<div class="replyArea">
							<textarea class="form-control" rows="5" name="text" id="text" required></textarea>
							<input class="btn btn-primary btn-block" type="submit" value="Send">
							<input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">
							<input type="hidden" name="recipient_id" value="{{ $message->sender->id }}">
						</div>
					</div>
				</form><hr>
			@endforeach
	</div>
	<div class="container col-md-6">
		<h1>Send messages:</h1><hr>
		<form method="POST" action="/messages">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Send message</label><br>
				<input class="form-control" type="text" name="recipient_name" placeholder="Recipient username" required>
				<textarea class="form-control" rows="5" name="text" id="text" required></textarea>
				<input class="btn btn-primary btn-block" type="submit" value="Send">
				<input type="hidden" name="sender" value="{{ Auth::user()->id }}">
			</div>
		</form><hr>
			@foreach($sentMessages as $message)
				<h3>{{ $message->text }}</h3>
				<p>Sent to {{ $message->recipient->name }} on {{ $message->created_at }}</p>
			@endforeach
	</div>
@endsection
<script
      src="{{ URL::asset('https://code.jquery.com/jquery-3.2.1.min.js') }}"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
@include('layouts.messages')