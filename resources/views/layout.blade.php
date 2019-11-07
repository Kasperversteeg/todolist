<!DOCTYPE html>
<html>
<head>
	<title>My todo list</title>
	<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}">
	</head>
<body>
	<div class="container">
		<div class="nav-container">
			<div class="nav">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="/category">Categories</a></li>
					<li class="login-button"><a href="/">Login</a></li>
				</ul>
			</div>
		</div>
		<div class="content-container">
			<div class="create-todo">
				@yield('input')
			</div>
			<hr>
			<div class="index-content">
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>