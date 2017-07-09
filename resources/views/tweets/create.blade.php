@extends ('layouts.app')

@section ('title')
	Create
@endsection

@section ('content')
	<h1>Create a tweet</h1>

	<form method="POST" action="/tweets">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Tweet away!</label><br>
			<textarea class="form-control" rows="5" name="text" id="text" required></textarea>
			<input class="btn btn-primary btn-block" type="submit" value="Send">
		</div>
	</form>
@endsection