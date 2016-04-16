@extends('layouts.master')

@section('title')
	<title>Google Search Results</title>
@endsection

@section('content')

     Person you searched for: <em>{{{ $name }}}</em>
     <br>
	Search query you use: <em>{{{ $filename}}}
	<br> 
	File containing search results was saved at: <strong>{{{storage_path()}}}/{{{ $filenameUnderscores }}}.json</strong> -- please <a href="/seeding">seed</a> this file.
	<hr>
	<br>

     @for ($x = 0; $x<count($json->responseData->results); $x++ )
     	<br>
     	<strong>Result {{{ $x+1 }}}</strong>
     	<br>
     	<strong>URL:</strong>  {{{ $json->responseData->results[$x]->url }}}
     	<br>
     	<strong>Visible URL:</strong> {{{ $json->responseData->results[$x]->visibleUrl }}}
     	<br>
     	<strong>Title:</strong> {{{ $json->responseData->results[$x]->title }}}
     	<br>
     	<strong>Content:</strong> {{{ $json->responseData->results[$x]->content }}}
     	<hr>
    @endfor 	


@endsection