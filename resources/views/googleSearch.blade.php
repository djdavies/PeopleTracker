@extends('layouts.master')

@section('title')
	Perform Google Person Search
@endsection

@section('content')

	{!! Form::open(array('url' => array('googlesearchresults'))) !!}

	{!! Form::label('name', 'Name of Person') !!}
	{!! Form::text('name', '', [
		'placeholder' => 'e.g. Daniel Davies'
		]) !!}

	{!! Form::label('query', 'Search Query') !!}
	{!!Form::text('query', '', [
		'placeholder' => "e.g. Cardiff University"
		])!!}

		{!!Form::submit('Go!')!!}

		{!!Form::close()!!}
@endsection