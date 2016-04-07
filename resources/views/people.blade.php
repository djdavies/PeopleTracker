@extends('layouts.master')

@section('content')

<h1>All current people <em>search profiles.</em></h1>

<div class="people">
	<em><strong>
	NB: many 'duplicate' names may appear, but the application supports people sharing the same name.
	<br>
	The challenge is to group multiple entries sharing the same name together once the user has clarified they are the same person. However, this behaviour can be simply overwritten during the <a href="/seeding">seeding</a> process: checking in the <code>if block</code> if the name exist, if it does, use that and do not create one.
	</strong></em>

    @if ($people)        
        @foreach ($people as $person)
	        <ul class="list-group">
	        <a href="people/{{{ $person->id }}}"><button type="button" class="btn btn-success">Mark results</button></a>
	        	<li class="list-group-item">
	            	<li class="list-group-item"><span class="label label-primary">Name<br></span>
	            		{{ $person->name }}
	            	</li>
	            	<li class="list-group-item"><span class="label label-primary">Query/search terms<br></span>
	            	 </li>
	            </li>	
	        </ul>
        @endforeach
    @endif
 </div>   

@endsection