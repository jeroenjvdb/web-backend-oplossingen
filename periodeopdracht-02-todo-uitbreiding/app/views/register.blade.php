@extends('layout')

@section('title')
registreren.

@stop

@section('content')

	<h1>registreren</h1>

	{{ Form::open() }}
		<p>
			<label for="email">Email</label><br />
			<input type="text" name="email" id="email" value="{{ Session::get('email') }}" />
			{{ ($errors->first('email')) ? '<p class="error">' . $errors->first('email') . '</p>' : '' }}		</p>
		<p>
			<label for="password">password</label><br />
			<input type="password" name="password" id="password" />
			
			{{ ($errors->first('password')) ? ('<p class="error">' . $errors->first('password') . '</p>') : '' }}
		</p>
		<p>
			<input type="submit" value="register" />
		</p>
	{{ Form::close() }}
@stop