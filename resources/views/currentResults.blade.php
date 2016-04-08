@extends('layouts.master')
@section('title')
	<title>Current Results</title>
@endsection

@section('content')
	<script type="text/javascript" src="{{ URL::asset('js/Chart.js') }}"></script>
	@foreach ($queryValCorrects as $queryValCorrect)
		{{{ $queryValCorrect->correct }}}
	@endforeach

@endsection