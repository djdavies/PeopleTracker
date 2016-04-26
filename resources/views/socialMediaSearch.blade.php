@extends('layouts.master')
@section('title')
	<title>Social Media Search</title>
@endsection

@section('content')
		<div class="jumbotron">
		<h2>Getting Social Media Data</h2>
		
		<p>Getting social media data isn't easy because scraping results from networks like Facebook, LinkedIn, and others, you are breaking their Terms of Conditions.</p>

		<h3>Legitimate Means?</h3>
		<p>Facebook offers the Facebook Graph API. This allows you to search your entire profile, but you cannot search others without an <em>Access Token.</em></p>

		<p>To gain Access Tokens, you would need to have a Facebook App, and be granted permission to publish this application to Facebook, and then users could accept the Access Token.</p>

		<p>LinkedIn also has an API, but this API is only available if you are a LinkedIn partner.</p>

		<h3>PIPL</h3>
		<p>PIPL is a people search web solution. It is, however, not free but you are able to use their <a href="https://pipl.com/dev/demo">demo search.</a></p>

		<p>Selecting the API Key <em>'Business Premium Demo'</em> is likely to give the most results, and these are returned as JSON. <strong>There are, howerver, limits to this demo sample.</strong></p>

		<p>So as not to break PIPL's ToC, copy the JSON response and look at <a href="/seeding#pipl">seeding PIPL data</a> for further explanation.</p>
		</div>

@endsection