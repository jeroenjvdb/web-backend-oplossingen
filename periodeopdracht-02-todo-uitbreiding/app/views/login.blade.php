@extends('layout')

@section('title')
login

@stop

@section('content')
	<h1>login</h1>

	{{ Form::open() }}
		<p><label for="email">email</label><br><input type="text" name="email" id="email" /></p>
		<p><label for="password">password</label><br><input type="password" name="password" id="password" /></p>
		<p><input type="submit" name="sign in" /></p>
	{{ Form::close() }}

@stop