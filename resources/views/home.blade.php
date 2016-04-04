@extends('layouts.master')

@section('title')
    People Tracker
@endsection

@section('content')
  <div class="jumbotron">
    <h1>People Tracker</h1>
    <p>Perform a Google Search, and get results back in JSON. This file will then be <a href="/seeding">seeded</a> into the database, and the fun will begin...</p>
    <ul class="list-group">
      <li class="list-group-item">View all people's results, e.g. all results for Daniel Davies.</li>
      <li class="list-group-item">View the search queries used to populate these results, e.g. daniel davies cardiff university.</li>
      <li class="list-group-item">Mark each result for the person as correct, or incorrect. e.g. daniel davies isn't from Spain (mark as incorrect), he lives in Wales (mark as correct)</li>
      <li class="list-group-item">See success rates for search queries. Which queries are the best to use to track someone down? On the first 8 results we gather, what percentage of those are correct?</li>
      <li class="list-group-item">Prune for keywords (<a href="people/1/prune">example</a>) in the content of search results -- these results can then be used to enhance a new query! e.g., you find occuptation, 'lawyer'; education, 'university of the M25'. Therefore the search will suggest person: daniel davies, further data: lawyer, M25 university. Search query: daniel davies m25 university.</li>
      <li class="list-group-item">For pruned keywords used in search results, some of these, e.g. 'lawyer', will be better than 'location: UK'. Some of these will be more 'socially specific', the person might even have a less-common name. Classification of pruned keywords used in search results can be recorded. e.g., cardiff = location, lawyer = occuptation. This will help the success rate graphs more useful</li>
    </ul>
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
