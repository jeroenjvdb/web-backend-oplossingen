@extends('layout')

@section('title')
new todo

@stop

@section('content')

	<h1>Voeg een TODO-item toe</h1>
	<a href="{{ URL::route('todo') }}">Terug naar mijn TODO's</a>
	{{ Form::open() }}
		<ul>
			<li>
				<label for="description">wat moet er gedaan worden?</label><br />
				<input type="text" name="description" id="description" /><br />
				@foreach($errors->all() as $error)
					<p class="inputerror">{{ $error }} </p>
				@endforeach
			</li>
		</ul>
		<input type="submit" value="Toevoegen!" />
	{{ Form::close() }}
@stop