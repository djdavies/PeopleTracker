@extends('layouts.master')

@section('content')

<h1>Profile for: {{{ $person->name }}}</h1>

<div class="people">
    @if ($person)        
        <li>{{{ $person->name }}}</li>
        <li>{{{ $googleResult }}}</li>

    @endif
 </div>   

@endsection