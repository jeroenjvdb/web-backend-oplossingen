@extends('layout')

@section('title')
dashboard

@stop

@section('content')
	<h1>dashboard</h1>
	<p>Dit is de applicatie die ik gemaakt heb
	<a href="{{ URL::route('todo') }}">Todo-applicatie</a></p>
@stop