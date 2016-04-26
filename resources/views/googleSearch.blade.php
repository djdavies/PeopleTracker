@extends('layouts.master')

@section('title')
	<title>Perform Google Person Search</title>
@endsection

@section('content')
    <ol class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li class="active">Google Search</li>
      <li><a href="seeding">Seeding</a></li>
    </ol>
	<h2>Search for new person.</h2>

	{!! Form::open(array('url' => array('googlesearchresults'))) !!}

	{!! Form::label('name', 'Name of Person') !!}
	{!! Form::text('name', '', [
		'size' => '75x5',
		'placeholder' => 'e.g. Daniel Davies'
		]) !!}
	<br>
	{!! Form::label('query', 'Search Query') !!}
	{!!Form::text('query', '', [
		'size' => '75x5',
		'placeholder' => "e.g. Cardiff University"
		])!!}
	<br>
	{!!Form::submit('Go!')!!}

	{!!Form::close()!!}
@endsection