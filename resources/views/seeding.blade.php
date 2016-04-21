@extends('layouts.master')

@section('title')
	<title>Seeding</title>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/prism.css') }}" />
@endsection

@section('js')
	<script type="text/javascript" src="{{ URL::asset('js/prism.js') }}"></script>
@endsection	

@section('content')
	<br>
	<div class="jumbotron">
	<h2>How to: <em>seed</em> your JSON Results To The MySQL DB.</h2>
	<ul class="list-group">
	  <li class="list-group-item">When performing a <a href="googlesearch">search</a>, you receive a JSON response. Each JSON file is downloaded to disk, and can be found in the <code>PeopleTracker/app/public</code> directory. Each file is named for you, according to your query, e.g. <code>daniel_davies.json</code></li>
	  <li class="list-group-item">Next, seed the newly file. This is <em>currently manual</em>: add the seeded class to be called in <code>database/seeds/DatabaseSeeder.php</code> in the <em>run function. e.g. <code>$this->call(DanielDaviesSeeder::class);</code>, where the seeder class called is found in the <code>PeopleTracker/app/database/seeds</code> directory. <strong>Automatically seeding, perhaps using a PHP Generator -- is being looked into.</strong>
	  <br>
	  <em>Alternatively, specify the seeder class directly by running: <code>php artisan db:seed --class=GoogleResultsOliverCummingKingsLynn</code></em>
	  <li class="list-group-item">
	  	<em>A seeder class MUST work with a JSON file. 
	  	<br>
	  	To build the seeder class, call your JSON file, and decode it into a PHP object. 
	  	<br>Then seed JSON results data: create an instance of the People model, and supply the name <em>e.g. John Smith.</em> 
	  	<br>
	  	Create an instance of the GoogleResults model, and then iterate over all the elements of the JSON you are intested in, binding the respective PeopleTracker database columns found in the google_results table to those elements of the PHP object and call the <code>save</code> method.</em>
	  </li>
	  <li class="list-group-item">
		  Output from GoogleResultsOliverCummingKingsLynn (numerous other seeder files in <code>app/database/seeds</code>):
		  <br>
		  <pre>
		  <code>
			  use Illuminate\Database\Seeder;
			  use App\People;
			  use App\GoogleResults;

			  class GoogleResultsOliverCummingKingsLynn extends Seeder
			  {
			      /**
			       * Run the database seeds.
			       *
			       * @return void
			       */
			      public function run()
			      {
			          $resultJson = Storage::get('oliver_cumming_king\'s_lynn.json');
			          $result = json_decode($resultJson);
			          
			          if ($result) {
			              // Check if the $result->name already exists in the DB.
			              if (!People::where('name', '=', $result->name)->exists()) {
			                  echo "Not a person existing with name of ". $result->name . ", creating...\n";
			                  People::create([
			                      'name' => $result->name
			                  ]);
			              } else {
			                  echo $result->name . " already exists, creating results.";
			              }    

			              $peopleId = People::select('id')->where('name', '=', $result->name)->first();

			              echo "PeopleId is: " . $peopleId;
			              // Iterate through objects and create results in DB.
			              for ($n = 0; $n < count($result->responseData->results); $n++) {
			                  $google = GoogleResults::create([
			                      'content' => $result->responseData->results[$n]->content,
			                      'people_id' => $peopleId->id,
			                      'title' => $result->responseData->results[$n]->title,
			                      'url' => $result->responseData->results[$n]->url,
			                      'query' => $result->query
			                  ]);
			              } // end for
			          } else {
			              echo "File not found: ";
			          } 
			      }
			  }
	  	  </code> 	
		  </pre>
	  </li>
	</ul>
	</div>	
@endsection
