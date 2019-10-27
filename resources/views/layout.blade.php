<!DOCTYPE html>
<html>
<head>
	<title>My todo list</title>
	<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}">
	</head>
<body>
	<div class="container">
		<div class="content-input">
			@yield('input')
		</div>
		<hr>
		<div class="content-container">
			@yield('content')
		</div>
		<div class="search">
			@yield('search-content')
		</div>
	</div>

</body>
</html>