@extends('layouts.master')

@section('title')
    <title>Pruning data: {{{ $person->name }}}</title>
@endsection

@section('content')
<h1>Pruning correct data results for: {{{ $person->name }}}</h1>
<p><em>These are all the results marked <strong>correct</strong>.</em></p>

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

<div class="people">
	@if($person)
		<p><strong>Manually analyse and enter important datasets to be written to the data table into the form below.</strong>
		<br>
		<em>e.g. location (London), organisation (Bank of England), employer (National Health Service), job title/role (HR Manager, Software Developer), university/school (Cardiff University) age, etc.</em></p>
		<h2>All results currently marked correct:</h2>
		@foreach ($googleResults as $googleResult)
		<ul class="list-group">
			<li class="list-group-item">
				{{{ $googleResult->title }}}
			</li>
			<li class="list-group-item">
				{{{ $googleResult->content }}}
			</li>
			<li class="list-group-item">
				<a href="{{{$googleResult->url}}}">{{{$googleResult->url}}}</a> -- visit URL to find more pruning data (voids ToC of many social networks).

			</li>	
		</ul>
		@endforeach
</div>

		<h3>Enter discovered data</h3>
		<strong><em>Please use a comma-separated list</em></strong>

		{!! Form::open(array('url' => array('people/prune', $person->id))) !!}
		{!! Form::label('pruned', 'Data Found') !!}

		{!! Form::text ('data', '', [
			'placeholder' => 'e.g. london, bank of england, software developer, cardiff university'
			])!!}
		<br>
		{!!Form::submit('Submit Pruning Data')!!}
		
		{!!Form::close()!!}	
	@else
		No person found.
	@endif	
@endsection

