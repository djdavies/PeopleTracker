@extends('layouts.master')

@section('title')
	Seeding
@endsection

@section('content')
	<br>
	<div class="jumbotron">
	<h2>How to: <em>seed</em> your JSON Results To The MySQL DB.</h2>
	<ul class="list-group">
	  <li class="list-group-item">When performing a <a href="googlesearch">search</a>, you receive a JSON response. Each JSON file is downloaded to disk, and can be found in the <code>PeopleTracker/app/public</code> directory. Each file is named for you, according to your query, e.g. <code>daniel_davies.json</code></li>
	  <li class="list-group-item">Next, seed the newly file. This is <em>currently manual</em>: add the seeded class to be called in <code>database/seeds/DatabaseSeeder.php</code> in the <em>run function. e.g. <code>$this->call(DanielDaviesSeeder::class);</code>, where the seeder class called is found in the <code>PeopleTracker/app/database/seeds</code> directory. <strong>Automatically seeding, perhaps using a PHP Generator -- is being looked into.</strong>
	  <li class="list-group-item">
	  	<em>A seeder class MUST work with a JSON file. 
	  	<br>
	  	To build the seeder class, call your JSON file, and decode it into a PHP object. 
	  	<br>Then seed JSON results data: create an instance of the People model, and supply the name <em>e.g. John Smith.</em> 
	  	<br>
	  	Create an instance of the GoogleResults model, and then iterate over all the elements of the JSON you are intested in, binding the respective PeopleTracker database columns found in the google_results table to those elements of the PHP object and call the <code>save</code> method.</em>
	  </li>
	  <li class="list-group-item">
	  Output from GoogleResultsDanielDaviesSeeder.php (numerous other seeder files in <code>app/database/seeds</code>:
	  <br>
	  <pre>
	  <code>
	  		// Get the JSON file, and decode it into a PHP object.
			$resultJson = File::get(storage_path() . '/daniel_davies_cardiff.json');
			$result = json_decode($resultJson);

			// If there is a result, create a person via the People model, using the 'name' value in the JSON/PHP object.
			// NB: 'name' is written via the form, into the JSON file itself.
			if ($result) {
			   	$people = People::create([
					'name' => $result->name
			]);
			    
			    // Iterate over the objects we're interested in, and create a google_result record in the database.
			    for ($n = 0; $n < count($result->responseData->results); $n++) {
						$google = GoogleResults::create([
							'content' => $result->responseData->results[$n]->content,
							'people_id' => $people->id,
							'title' => $result->responseData->results[$n]->title,
							'url' => $result->responseData->results[$n]->url,
			                'query' => $result->query
						]);
				} 
			} 
			// Save both the google_result and the person in their respective models.
			$people->save();
			$google->save();
  	  </code> 	
	  </pre>
	  </li>
	</ul>
	</div>	
@endsection