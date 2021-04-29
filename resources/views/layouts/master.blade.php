<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	@yield('styles')
</head>
<body>
	@include('layouts.partials._top')
	<div class="container">
		@yield('contents')
	</div>
	@include('layouts.partials._bottom')
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	@yield('scripts')
</body>
</html>