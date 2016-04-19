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
	<div class="jumbotron">
		@foreach ($pruneds as $pruned)
			<ul class="list-group">
			  <span class="label label-default" id="{{{ $pruned->id }}}">Pruned data found</span>
			  <li class="list-group-item">
				<span class="label label-success">{{{ $pruned->data }}}</span>
		    	<span class="badge">{{{ $pruned->classification }}}</span> 		
		    	{!! Form::open(array('url' => array('prunedata/classify', $pruned->id))) !!}

				{!! Form::label('classification', 'Classification of data') !!}
				{!! Form::text('classification', '', ['size' => '75x5',
					'placeholder' => 'organisation, school, name, job title, field of work/study, location'
					]) !!}

				{!!Form::submit('Classify!')!!}

				{!!Form::close()!!}
				<em>NB: this should be a 1 word classifier for the type of data that you've pruned.</em>
			  </li>
			</ul>
		@endforeach 
	</div>
</div>        		
@endsection