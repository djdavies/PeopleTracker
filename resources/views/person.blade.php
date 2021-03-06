@extends('layouts.master')

@section('title')
    <title>Profile for: {{{ $person->name }}}</title>
@endsection

@section('content')
    <ol class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><a href="/people">Current People Profiles</a></li>
      <li class="active">Profile for {{{ $person->name }}}</li>
    </ol>

    <h1>Profile for: {{{ $person->name }}}</h1>
    <p>Here are all the current results. Please mark these results as correct or incorrect.</p>
    <p><em>NB: results are assumed incorrect by default.</em></p>
    <p>Once completed: <a href="{{{ $person->id }}}/prune"><button type="button" class="btn btn-success">Prune Correct Results Content Data</button></a></p>

    <div class="person">
        @if(Session::has('flash_message'))
            <div class="alert alert-info">
                {{ Session::get('flash_message') }}
            </div>
        @endif  

        @if($person)
            @foreach ($googleResults as $googleResult)
                <ul class="list-group">
                    <span class="label label-default" id="{{{ $googleResult->id }}}">
                        Google Result {{{ $googleResult->id }}}
                    </span>

                    <li class="list-group-item">
                        <span class="label label-primary">Title</span>
                        <br>
                        {{{ $googleResult->title }}}
                    </li>
                    <li class="list-group-item">
                        <span class="label label-primary">Content</span>
                        <br>
                        {{{ $googleResult->content }}}
                    </li>
                    <li class="list-group-item">
                        <span class="label label-primary">URL</span>
                        <br>
                        {{{ $googleResult->url }}}
                    </li>
                    <li class="list-group-item">
                        <span class="label label-primary">Current marking</span>
                        <br>
                        @if($googleResult->correct == 0)
                            <div class="alert alert-danger" role="alert">Incorrect.
                        @else
                            <div class="alert alert-success" role="alert">Correct!
                        @endif        
                            </div>
                    </li>
                    <li class="list-group-item">
                        Correct result?
                        <a href="/googleresult/{{$googleResult->id}}/correct">
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </button>
                        </a>
                        <a href="/googleresult/{{$googleResult->id}}/incorrect">
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                        </a>
                    </li>
                </ul>
            @endforeach 
        @endif
    </div>
@endsection