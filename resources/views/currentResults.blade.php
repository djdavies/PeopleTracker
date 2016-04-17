@extends('layouts.master')
@section('title')
	<title>Current Results</title>
@endsection

@section('content')
	<script type="text/javascript" src="{{ URL::asset('js/Chart.js') }}"></script>

	<h2>Of all queries used, how many results were correct?</h2>
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