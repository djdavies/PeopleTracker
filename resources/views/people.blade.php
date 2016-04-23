@extends('layouts.master')

@section('title')
    <title>Current Profiles</title>
@endsection

@section('content')

<h1>All current people <em>search profiles.</em></h1>

<div class="people">
	<div class="alert alert-warning" role="alert">
		If you have results for a person having the same name as a previous result, you will need to rename that person for them to show here. Currently, so a person can have many search results, all search results bind to a person entity sharing a name.
	</div>
    @if ($people)        
        @foreach ($people as $person)
	        <ul class="list-group">
	        	<li class="list-group-item">
	            	<span class="label label-primary">Name</span>
	            		<h2>{{ $person->name }}</h2>
	        		<br>
	        		<a href="people/{{{ $person->id }}}">
	        			<button type="button" class="btn btn-success">Mark Results and Create Pruned Data</button>
	        		</a>
	        		<a href="people/{{{ $person->id }}}/results">
	        			<button type="button" class="btn btn-info">Successful Results</button>
	        		</a>
	        		<a href="people/{{{ $person->id }}}/pruned">
	        			<button type="button" class="btn btn-warning">
	        			Classify Pruned Data
	        			</button>
	        		</a>
	        		<a href="people/{{{ $person->id }}}/pruned">
	        			<button type="button" class="btn btn-warning">
	        			Suggested search parameters
	        			</button>
	        		</a>
	            </li>	
	        </ul>
        @endforeach
    @endif
 </div>   

@endsection