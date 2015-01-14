<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" />
</head>
<body>
	<div id="container">
		<header class="group">	
			<div>
				<a href="#">Home</a>
			</div>
			<nav>
				<ul>
					<?php if(Auth::user()): ?>
						<li><a href="{{ URL::route('Home') }}">Dashboard</a></li>
						<li><a href="{{ URL::route('todo') }}">Todos</a></li>
						<li><a href="{{ URL::route('logout') }}">uitloggen ({{ Auth::user()->email }})</a></li>
					<?php else: ?>
						<li><a href="{{ URL::route('login')}}">login</a></li>
						<li><a href="{{ URL::route('register') }}">registreer</a></li>
					<?php endif; ?>
				</ul>
			</nav>

		</header>
	
		


		
		
			
		<div class="body">

			@if(Session::get('successes'))
				@foreach(Session::get('successes') as $success)
					<div class="modal success">
						{{ $success }}
					</div>	
				@endforeach
			@endif

			@if(Session::get('errors'))
				@foreach(Session::get('errors') as $error)
					<div class="modal error">
						{{ $error }}
					</div>	
				@endforeach
			@endif

			@yield('content')
		</div>
		
	</div>
</body>
</html>