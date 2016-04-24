@extends('layouts.master')

@section('title')
    <title>Suggested Search</title>
@endsection

@section('content')
	<h1>Suggested Searches for {{{ $person->name }}}</h1>
	<div class="alert alert-success" role="alert">
		<em>Select what search parameters queries you would like to use in the search.</em>
	</div>

	<div class="alert alert-warning" role="alert">
		<em>You probably don't want to select all or too many, as the result becomes too specific and you won't get anything.</em>
	</div>
	


	{{ Form::open(array('url' => array('suggestedSearch/'.$person->id))) }}
	@foreach ($suggesteds as $suggested)
		<?php $suggested->data = ltrim($suggested->data); ?>
		{{ Form::label($suggested->data, $suggested->data) }}
    	{{ Form::checkbox($suggested->data, 'yes', false) }}
    @endforeach 	
    {{ Form::submit('Search!') }}
	{{ Form::close() }}


@endsection