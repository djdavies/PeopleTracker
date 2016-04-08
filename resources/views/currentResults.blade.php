@extends('layouts.master')
@section('title')
	<title>Current Results</title>
@endsection

@section('content')
	<script type="text/javascript" src="{{ URL::asset('js/Chart.js') }}"></script>

	<h2>What percentage of search results were successful?</h2>
	<canvas id="rice" width="600" height="400"></canvas>
	
	<script type="text/javascript">
	var riceData = {
	// Queries used, hard-coded....
	labels : ["None","Cardiff","Cardiff University","The Alacrity Foundation","Jake","Computer Science"],
	datasets :
	 [
	    {
	      fillColor : "rgba(172,194,132,0.4)",
	      strokeColor : "#ACC26D",
	      pointColor : "#fff",
	      pointStrokeColor : "#9DB86D",
	      // Summed correct values.
	      data : [0,0,0,1,4,1]
	    }
	 ]
	}

	  var rice = document.getElementById('rice').getContext('2d');
	       new Chart(rice).Line(riceData);
	</script>

@endsection