@extends('layouts.master')

@section('content')
<h1>Pruning correct data results for: {{{ $person->name }}}</h1>
<p><em>These are all the results marked <strong>correct</strong>.</em></p>
<div class="people">
	@if($person)
		<p><strong>Manually analyse and enter important datasets to be written to the data table into the form below.</strong>
		<br>
		<em>e.g. location (London), organisation (Bank of England), employer (National Health Service), job title/role (HR Manager, Software Developer), university/school (Cardiff University) age, etc.</em></p>
		<h2>All results currently marked correct:</h2>
		@foreach ($googleResults as $googleResult)
		<ul class="list-group">
			<li class="list-group-item">
				{{{ $googleResult->content }}}
			</li>
		</ul>
		@endforeach
</div>

		<h3>Enter discovered data</h3>
		<strong><em>Please use a comma-separated list</em></strong>

		{!! Form::open(array('url' => array('people/prune', $person->id))) !!}
		{!! Form::label('dataFound', 'Data Found') !!}

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

