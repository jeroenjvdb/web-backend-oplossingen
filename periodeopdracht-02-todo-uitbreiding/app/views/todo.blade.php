@extends('layout')

@section('title')
Todo-applicatie

@stop

@section('content')
	<h1>De TODO-app</h1>
	@if(!$todo && !$done)
		Nog geen Todo-items.
		<a href="{{ URL::route('newTodo') }}"> Voeg item toe </a>.
	@else

	<h2>Wat moet er allemaal gebeuren?</h2>
	<a href="{{ URL::route('newTodo') }}">Voeg een item toe</a>
	<h3>Todo</h3>
	@if(!$todo)
		<p>Allright, all done!</p>
	@else
	<ul class="list">
	
	@foreach($todo as $item)
		<li class="todo">
			<span class="activate">
				{{ HTML::linkRoute('activate', '', array( $item->id ), array( 'class' => 'icon fontawesome-ok-sign', 'title' => 'Vink maar af!')) }}
			</span>
			<span class="text">
				{{ $item->name }}
			</span>
			<span class="delete">
					{{ HTML::linkRoute('delete', '', array( $item->id ), array( 'class' => 'icon fontawesome-remove', 'title' => 'verwijder dit maar' ) ) }}

			</span>
		</li>
	@endforeach
	</ul>
	@endif
	<h3>done</h3>
	@if(!$done)
		<p>Damn, werk aan de winkel</p>
	@else
	<ul class="list">

	@foreach($done as $item)
		<li class="todo">
			<span class="activate">
				{{ HTML::linkRoute('activate', '', array( $item->id ), array( 'class' => 'icon fontawesome-ok-sign')) }}
				
			</span>
			<span class="text">
				{{ $item->name }}
			</span>
			<span class="delete">
				{{ HTML::linkRoute('delete', '', array( $item->id ), array( 'class' => 'icon fontawesome-remove' ) ) }}
			</span>
		</li>
	@endforeach
	</ul>
	@endif
	@endif
@stop