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
	  <li class="list-group-item">Next, seed the newly file. This is <em>currently manual</em>: add the seeded class to be called in <code>database/seeds/DatabaseSeeder.php</code> in the <em>run function. e.g. <code>$this->call(DanielDaviesSeeder::class);</code>, where the seeder class called is found in the <code>PeopleTracker/app/database/seeds</code> directory.
	  <li class="list-group-item">
	  	<em>A seeder class MUST work with a JSON file. 
	  	<br>
	  	To build the seeder class, call your JSON file, and decode it into a PHP object. 
	  	<br>Then seed JSON results data: create an instance of the People model, and supply the name <em>e.g. John Smith.</em> 
	  	<br>
	  	Create an instance of the GoogleResults model, and then iterate over all the elements of the JSON you are intested in, binding the respective PeopleTracker database columns found in the google_results table to those elements of the PHP object and call the <code>save</code> method.</em>
	  </li>
	  <li class="list-group-item">
	  Output from GoogleResultsDanielDaviesSeeder.php:
	  <br>
	  <pre>
	  <code>
	  	// Get JSON file and decode to PHP object.
	    $resultJson = File::get(storage_path() . '/GoogleResults.json');
        $result = json_decode($resultJson);

        // Check if we have a valid object/result.
        if ($result) {
        	// Using the People model, create a new person (name).
           	$people = App\People::create([
    		'name' => 'Daniel Davies Seeding'
    	]);
        	// Add results, binding database column names to PHP object elements.
        	foreach ($result as $object) {
				$google = App\GoogleResults::create([
					'content' => $object->content,
					'people_id' => $people->id,
					'title' => $object->title,
					'url' => $object->url,
			    ]);
			} 
        } 
        // Save both the person and the google results.
        $people->save();
    	$google->save();
  	  </code> 	
	  </pre>
	  </li>
	</ul>
	</div>	
@endsection
