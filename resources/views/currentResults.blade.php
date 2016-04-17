@extends('layouts.master')
@section('title')
	<title>Current Results</title>
@endsection

@section('content')
	<script type="text/javascript" src="{{ URL::asset('js/Chart.js') }}"></script>

	<h2>How many results were correct for {{{ $person->name }}}?</h2>
	<p><em>Of 8 results per search, how many were correct with which queries?<br>'None' means no further query apart from the person's name was searched.</em></p>
	<canvas id="queries" width="600" height="400"></canvas>
	
	<script type="text/javascript">
	// Convert PHP array with JSON for use in JS.
	var jArrayKeys = <?php echo json_encode($queryKeys); ?>;
	var jArrayValues = <?php echo json_encode($queryValues); ?>;

	var queryData = {
	// Use query keys.
	labels : jArrayKeys,
	datasets :
	 [
	    {
	      fillColor : "rgba(172,194,132,0.4)",
	      strokeColor : "#ACC26D",
	      pointColor : "#fff",
	      pointStrokeColor : "#9DB86D",
	      // Use query values.
	      data : jArrayValues
	    }
	 ]
	}

	  var queries = document.getElementById('queries').getContext('2d');
	       new Chart(queries).Line(queryData);
	</script>

@endsection