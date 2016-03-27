@extends('layouts.master')

@section('title')
    People Tracker
@endsection

@section('content')
    <div class="jumbotron">
  <h1>People Tracker</h1>
  <p>Perform a Google Search, and get results back in JSON. This file will then be seeded into the database, and the fun will begin...</p>
  <h3>Project progress:</h3>
  <div class="alert alert-warning" role="alert">List of project features, and developer tasks.</div>
  <ul class="list-group">
  <li class="list-group-item">
    <span class="badge">Complete</span>
    Google Search Results, with JSON response.
  </li>
    <li class="list-group-item">
        <span class="badge">Complete</span>
            Current People: view all profiles, with marking of each results as correct/incorrect.
    </li>

    <li class="list-group-item">
        <span class="badge">In Progress</span>
            Further seach parameters, suggested on correctly validated user data.
    </li>

    <li class="list-group-item">
        <span class="badge">Complete</span>
            Seeding of JSON files to DB, with documentation.
    </li>

    <li class="list-group-item">
        <span class="badge">In Progress</span>
            LinkedIn/Social Media Search Results.
    </li>
    <li class="list-group-item">
        <span class="badge">In Progress</span>
        Graphs showing search success rate, implying best search parameters to use.
    </li>
</ul>
  <p><a class="btn btn-primary btn-lg" href="/googlesearch" role="button">Try it!</a></p>
</div>
@endsection
