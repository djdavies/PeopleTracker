@extends('layouts.master')
@section('title')
	<title>Current Results</title>
@endsection

@section('content')
	<script type="text/javascript" src="{{ URL::asset('js/Chart.js') }}"></script>

	<h2>How many results (of first page) were correct for {{{ $person->name }}}?</h2>
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

	<h2>How much information was discovered for {{{$person->name}}}?</h2>
	<canvas id="classifications" width="600" height="400"></canvas>

	<script type="text/javascript">
		var jArrayClassificationsCount = <?php echo json_encode($classificationsCount); ?>;

		var keys = Object.keys(jArrayClassificationsCount);

		var val = [];
		// Object values
		for (var i = 0; i < keys.length; i++) {
			val.push(jArrayClassificationsCount[keys[i]]);
		}

		var classificationData = {
			labels : keys,
			datasets : 
				[
					{
						label : "First dataset",
			            fillColor: "rgba(94,15,132,0.4)",
			            strokeColor: "rgba(172,194,132,0.4)",
			            pointColor: "rgba(220,220,220,1)",
			            pointStrokeColor: "#000",
			            pointHighlightFill: "#000",
			            pointHighlightStroke: "rgba(172,194,132,0.4)",
						// Use object values.
						data : val,
					}
				]
			}

		var classifications = document.getElementById('classifications').getContext('2d');
		new Chart(classifications).Radar(classificationData);
	</script>

@endsection