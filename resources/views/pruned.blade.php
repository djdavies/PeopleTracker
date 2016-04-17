@extends('layouts.master')

@section('title')
    <title>Pruned Data</title>
@endsection

@section('content')
<div class="pruned">
    @if(Session::has('flash_message'))
        <div class="alert alert-info">
            {{ Session::get('flash_message') }}
        </div>

    @endif  
	<h2>Pruned data for: {{{ $person->name }}}</h2>
	<br>
	@foreach ($pruneds as $pruned)
		<ul class="list-group">
		  <span class="label label-default">Pruned data found</span>
		  <li class="list-group-item">
		{{{ $pruned->data }}}
		    <span class="badge">name</span>
		    	{!! Form::open(array('url' => array('prunedclassification/{id}'))) !!}

				{!! Form::label('classification', 'Classification of data') !!}
				{!! Form::text('classification', '', [
					'placeholder' => 'organisation, school, name, job title, field of work/study, location'
					]) !!}

				{!!Form::submit('Classify!')!!}

				{!!Form::close()!!}

		  </li>
		</ul>
	@endforeach 
</div>        		
@endsection