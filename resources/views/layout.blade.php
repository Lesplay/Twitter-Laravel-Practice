<!DOCTYPE html>
<html>
<head>
	<title>Twitter - @yield('title')</title>
</head>
<body>
	@include ('layouts.nav')
	<div class="container">
		@yield('content')
	</div>
</body>
</html>