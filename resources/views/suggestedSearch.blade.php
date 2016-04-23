@extends('layouts.master')

@section('title')
    <title>Suggested Search</title>
@endsection

@section('js')
	<script type="text/javascript">
		$(function () {
	  		$('[data-toggle="popover"]').popover()
		});

		$(".checkbox").on("change", function(){
		    var queryParams = [];
		    $('.checkbox:checked').each(function(){        
		        var queryParamsArr = $(this).next().text();
		        queryParams.push(queryParamsArr);
		    });
		    $(".search_queries").html(queryParams.join(" "));
		});
	</script>	
@endsection

@section('content')
	<h1>Suggested Searches for {{{ $person->name }}}</h1>
	<div class="alert alert-success" role="alert">
		<em>Select what search parameters queries you would like to use in the search.</em>
	</div>

	<div id="checkboxlist">
			@foreach ($suggesteds as $suggested)
			<label class="checkbox-inline">
				    <input type="checkbox" class="checkbox {{{$suggested->data}}}" name="{{{$suggested->data}}}" id="{{{$suggested->data}}}">
				    <label class="checkbox" for="{{{$suggested->data}}}">
				    {{{$suggested->data}}}
				    </label>
			</label>	    
			@endforeach
	</div>

	<span class="label label-info">Will search for {{{$person->name}}} and...</span>
	<div class='search_queries'>Nothing else.</div>

	<div class="btn-group btn-group-justified" role="group">
	  <div class="btn-group" role="group">
	    <button type="button" class="btn btn-success">Perform Search!</button>
	  </div>
	</div>
@endsection