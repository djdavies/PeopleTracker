@extends('layouts.master')

@section('content')

	<div class="panel-body">
		<!-- Display Validation Errors -->
		@include('common.errors')

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
		            <a href="googlesearchperson">
		            	<button type="submit" class="btn btn-default">
		                	<i class="fa fa-plus"></i> Search!
		            	</button>
		            </a>
		        </div>
		    </div>
		</form>
	</div>



@endsection