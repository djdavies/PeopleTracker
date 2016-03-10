@extends('layouts.master')

@section('content')

<h1>All current people profiles.</h1>

<div class="people">
    @if ($people)        
        @foreach ($people as $person)
            <a href="people/{{{ $person->id }}}"<li>{{ $person->name }}</li></a>
        @endforeach
    @endif
 </div>   

@endsection