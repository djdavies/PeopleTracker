@extends('layouts.master')
@section('title')
	<title>Social Media Results</title>
@endsection

@section('content')

	@if ($socialMedias)
		<div class="person">
		    @if(Session::has('flash_message'))
		        <div class="alert alert-info">
		            {{ Session::get('flash_message') }}
		        </div>
		    @endif  
		<div class="row">
		  	<div class="col-sm-6 col-md-6">
		  	<ul class="list-group">
				@foreach($socialMedias as $socialMedia)
					@if ($socialMedia->gender)
						<li class="list-group-item" id="{{{ $socialMedia->id }}}">
							Is the person <strong>{{{ $socialMedia->gender }}}</strong>?
                        <a href="/socialmediaresult/{{$socialMedia->id}}/correct">
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </button>
                        </a>
                        <a href="/socialmediaresult/{{$socialMedia->id}}/incorrect">
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                        </a>
                        <br>
                        <span class="label label-primary">Current marking</span>
                        <br>
                        @if($socialMedia->correct == 0)
                            <div class="alert alert-danger" role="alert">Incorrect.
                        @else
                            <div class="alert alert-success" role="alert">Correct!
                        @endif        
                            </div>
						</li>
					@endif
					@if ($socialMedia->addresses)
						<li class="list-group-item" id="{{{ $socialMedia->id }}}">		
							Has the person lived in, or worked in <strong>{{{ $socialMedia->addresses }}}</strong>?
							<a href="/socialmediaresult/{{$socialMedia->id}}/correct">
							    <button type="button" class="btn btn-default" aria-label="Left Align">
							        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							    </button>
							</a>
							<a href="/socialmediaresult/{{$socialMedia->id}}/incorrect">
							    <button type="button" class="btn btn-default" aria-label="Left Align">
							        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							    </button>
							</a>
							<br>
							<span class="label label-primary">Current marking</span>
							<br>
							@if($socialMedia->correct == 0)
							    <div class="alert alert-danger" role="alert">Incorrect.
							@else
							    <div class="alert alert-success" role="alert">Correct!
							@endif        
							    </div>
						</li>
					@endif
					@if ($socialMedia->jobs)	
						<li class="list-group-item" id="{{{ $socialMedia->id }}}">
							Was/is the person's job <strong>{{{ $socialMedia->jobs }}}</strong>?
							<a href="/socialmediaresult/{{$socialMedia->id}}/correct">
							    <button type="button" class="btn btn-default" aria-label="Left Align">
							        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							    </button>
							</a>
							<a href="/socialmediaresult/{{$socialMedia->id}}/incorrect">
							    <button type="button" class="btn btn-default" aria-label="Left Align">
							        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							    </button>
							</a>
							<br>
							<span class="label label-primary">Current marking</span>
							<br>
							@if($socialMedia->correct == 0)
							    <div class="alert alert-danger" role="alert">Incorrect.
							@else
							    <div class="alert alert-success" role="alert">Correct!
							@endif        
							    </div>
						</li>
					@endif
					@if ($socialMedia->educations)	
						<li class="list-group-item" id="{{{ $socialMedia->id }}}">
							Was the person educated at <strong>{{{ $socialMedia->educations }}}</strong>?
							<a href="/socialmediaresult/{{$socialMedia->id}}/correct">
							    <button type="button" class="btn btn-default" aria-label="Left Align">
							        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							    </button>
							</a>
							<a href="/socialmediaresult/{{$socialMedia->id}}/incorrect">
							    <button type="button" class="btn btn-default" aria-label="Left Align">
							        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							    </button>
							</a>
							<br>
							<span class="label label-primary">Current marking</span>
							<br>
							@if($socialMedia->correct == 0)
							    <div class="alert alert-danger" role="alert">Incorrect.
							@else
							    <div class="alert alert-success" role="alert">Correct!
							@endif        
							    </div>
						</li>
					@endif
					@if ($socialMedia->images)
						<li class="list-group-item" id="{{{ $socialMedia->id }}}">
							<div class="thumbnail">
								<img src="{{{ $socialMedia->images }}}" alt="...">
								<div class="caption">	
									<p>Is this an image of the person?</p>
									<a href="/socialmediaresult/{{$socialMedia->id}}/correct">
									    <button type="button" class="btn btn-default" aria-label="Left Align">
									        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
									    </button>
									</a>
									<a href="/socialmediaresult/{{$socialMedia->id}}/incorrect">
									    <button type="button" class="btn btn-default" aria-label="Left Align">
									        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									    </button>
									</a>
								</div>
								<br>
								<span class="label label-primary">Current marking</span>
								<br>
								@if($socialMedia->correct == 0)
								    <div class="alert alert-danger" role="alert">Incorrect.
								@else
								    <div class="alert alert-success" role="alert">Correct!
								@endif        
								    </div>
							</div>
						</li>
					@endif
					@if ($socialMedia->user_ids)
						<li class="list-group-item" id="{{{ $socialMedia->id }}}">	
							Does this social media account belong to the person? <br> {{{$socialMedia->user_ids }}}
							<a href="/socialmediaresult/{{$socialMedia->id}}/correct">
							    <button type="button" class="btn btn-default" aria-label="Left Align">
							        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							    </button>
							</a>
							<a href="/socialmediaresult/{{$socialMedia->id}}/incorrect">
							    <button type="button" class="btn btn-default" aria-label="Left Align">
							        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							    </button>
							</a>
							<br>
							<span class="label label-primary">Current marking</span>
							<br>
							@if($socialMedia->correct == 0)
							    <div class="alert alert-danger" role="alert">Incorrect.
							@else
							    <div class="alert alert-success" role="alert">Correct!
							@endif        
							    </div>
						</li>
					@endif	
				@endforeach
				</ul>
			</div>
		</div>
	@else 
		<p>No Social Media results found for {{{ $person->id }}}</p>
	@endif		
@endsection