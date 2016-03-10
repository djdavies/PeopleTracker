@extends('layouts.master')

@section('content')

<h1>Profile for: {{{ $person->name }}}</h1>

<div class="people">
        @if($person)
            @foreach ($googleResults as $googleResult)
    <ul class="list-group">
        <span class="label label-default">Google Result {{{ $googleResult->id }}}</span>
        <li class="list-group-item"><span class="label label-primary">Title</span><br>{{{ $googleResult->title }}}</li>
        <li class="list-group-item"><span class="label label-primary">Content</span><br>{{{ $googleResult->content }}}</li>
        <li class="list-group-item"><span class="label label-primary">URL</span><br>{{{ $googleResult->url }}}</li>
        <li class="list-group-item">
            Correct result?
            <a href="googleresult/{{$googleResult->id}}">
                <button type="button" class="btn btn-default" aria-label="Left Align">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                </button>
            </a>
            <button type="button" class="btn btn-default" aria-label="Left Align">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
        </li>
    </ul>
            @endforeach    
        @endif
 </div>   

@endsection