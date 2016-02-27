@extends('layouts.master')

@section('content')

	<div class="panel-body">
		<!-- Display Validation Errors -->
		@include('common.errors')

		<!-- New Task Form -->
		<form action="{{ url('googleSearch') }}" method="POST" class="form-horizontal">
		    {!! csrf_field() !!}

		    <!-- Task Name -->
		    <div class="form-group">
		        <label for="googleSearch" class="col-sm-3 control-label">Google Search</label>

		        <div class="col-sm-6">
		            <input type="text" name="name" id="googleSearch-name" class="form-control">
		        </div>
		    </div>

		    <!-- Add Task Button -->
		    <div class="form-group">
		        <div class="col-sm-offset-3 col-sm-6">
		            <button type="submit" class="btn btn-default">
		                <i class="fa fa-plus"></i> Search!
		            </button>
		        </div>
		    </div>
		</form>
	</div>



@endsection


<!-- Old GUI form input group stuff -->
<!-- <div class="alert alert-info" role="alert">Full name, e.g. Daniel Davies</div>
<div class="input-group">

<span class="input-group-addon" id="basic-addon3">Person name</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>

<div class="alert alert-info" role="alert">Please only provide one, e.g. Cardiff University</div>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon3">School, address, age, location, etc.</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>

<button type="button" class="btn btn-default">Search</button>

 -->