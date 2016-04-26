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
	<div class="alert alert-info" role="alert">You will find after creating one seeder class based on the code and instructions here, you can seed more data into the database in a matter of how fast you can copy/paste.</div>
	<br>
	<div class="jumbotron">
	<h2>How to: <em>seed</em> your JSON Results To The MySQL DB.</h2>
	<ul class="list-group" id="seeding">
	  <li class="list-group-item">
	  	<p>When performing a <a href="googlesearch">search</a>, you receive a JSON response. Each JSON file is downloaded to disk, and can be found in the <code>PeopleTracker/storage</code> directory. Each file is named for you, according to your query, e.g. <code>daniel_davies.json</code></p>
	  </li>
	  <li class="list-group-item">
		  <p>Next, seed the newly file. This is <em>currently manual</em>: add the seeded class to be called in <code>database/seeds/DatabaseSeeder.php</code> in the <em>run function. e.g. <code>$this->call(DanielDaviesSeeder::class);</code>, where the seeder class called is found in the <code>PeopleTracker/app/database/seeds</code> directory. <strong>Automatically seeding, perhaps using a PHP Generator -- is being looked into.</strong>
		  <br>
		  <em>Alternatively, specify the seeder class directly by running: <code>php artisan db:seed --class=GoogleResultsOliverCummingKingsLynn</code></em></p>
	  </li>
	  <li class="list-group-item">
	  	<p><em>A seeder class MUST work with a JSON file. 
	  	<br>
	  	To build the seeder class, call your JSON file, and decode it into a PHP object. 
	  	<br>Then seed JSON results data: create an instance of the People model, and supply the name <em>e.g. John Smith.</em> 
	  	<br>
	  	Create an instance of the GoogleResults model, and then iterate over all the elements of the JSON you are intested in, binding the respective PeopleTracker database columns found in the google_results table to those elements of the PHP object and call the <code>save</code> method.</em></p>
	  </li>
	  <li class="list-group-item">
		  <p>Output from GoogleResultsOliverCummingKingsLynn (numerous other seeder files in <code>app/database/seeds</code>):</p>
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
	  <li class="list-group-item" id="pipl">
	  	<h2>Seeding PIPL Data</h2>
	  	<p>When performing a PIPL <a href="socialMediaSearch">social media search</a>, you receive JSON that's more complex than the Google JSON. Copy this file with your other seeder files in the <code>PeopleTracker/storage</code> directory, giving the seeder file appropriate name and extension, e.g. <code>daniel_davies_pipl.json</code>. Create a PHP class with respective class name, e.g. <code>DanielDaviesPiplSeeder</code>.</p>

	  	<p>Refer <a href="#seeding">above</a> for seeding instructions, which are also valid.</p>

	  	<p>For detailed code out for seeding a PIPL json file, see below.</p>
	  	<pre>
	  		<code>
	  			use Illuminate\Database\Seeder;
	  			use App\People;
	  			use App\GoogleResults;
	  			use App\SocialMedia;

	  			class PiplDanielJakeDavies extends Seeder
	  			{
	  			    /**
	  			     * Run the database seeds.
	  			     *
	  			     * @return void
	  			     */
	  			    public function run()
	  			    {
	  			        $resultJson = Storage::get('pipl_daniel_jake_davies.json');
	  			        $result = json_decode($resultJson);
	  			        
	  			        if ($result) {
	  			        	// Echo the 'display' name
	  			        	$name = strtolower($result->query->names[0]->first . ' ' .$result->query->names[0]->last);

	  			        	if (!People::where('name', '=', $name)->exists()) {
	  			                echo "Not a person existing with name of ". $name . ", creating...\n";
	  			                People::create([
	  			                    'name' => $name
	  			                ]);
	  			            } else {
	  			                // echo $name . " already exists, creating results.";
	  			            }    

	  			            $peopleId = People::select('id')->where('name', '=', $name)->first();

	  			            // Perform the count here, so it's not in a loop iterating over a fairly large array, for performance.
	  			            // Excuse the 'magic number', it's simply because I always want only the first person, as it's the most likely hit. The other possible persons won't have an nth 
	  			            // array element to iterate, either. That is, some for say 'educations' will be
	  			            // blank, and it'll fail.
	  			 			$addressesCount = count($result->possible_persons[0]->addresses);
	  			 			$genderCount = count($result->possible_persons[0]->gender);
	  			 			$jobsCount = count($result->possible_persons[0]->jobs);
	  			 			$educationsCount = count($result->possible_persons[0]->educations);
	  			 			$userIdsCount = count($result->possible_persons[0]->user_ids);
	  			 			$imagesCount = count($result->possible_persons[0]->images);

	  			            // Echo gender. 
	  			            echo "**** GENDER ****\n";
	  			        	// print_r($result->possible_persons[0]->gender->content."\n");
	  			        	$social_media_gender = SocialMedia::create([
	  			        		'people_id' => $peopleId->id,
	  			        		'gender' => $result->possible_persons[0]->gender->content
	  			        	]);
	  			            // echo "\n";

	  			            // Echo addresses.
	  			            echo "**** ADDRESSES ****\n";	
	  			            for ($n = 0; $n < $addressesCount; $n++)
	  			            	// print_r($result->possible_persons[0]->addresses[$n]->display."\n");
	  							$social_media_addresses = SocialMedia::create([
	  								'people_id' => $peopleId->id,
	  								'addresses' => $result->possible_persons[0]->addresses[$n]->display
	  							]);
	  						// echo "\n";

	  			            // Echo jobs.
	  			            echo "**** JOBS ****\n";
	  			            for ($n = 0; $n < $jobsCount; $n++)
	  			            	// print_r($result->possible_persons[0]->jobs[$n]->display."\n");
	  			            	$social_media_jobs = SocialMedia::create([
	  			            		'people_id' => $peopleId->id,
	  			            		'jobs' => $result->possible_persons[0]->jobs[$n]->display
	  			            	]);
	  			            // echo "\n";

	  			            // Echo educations.
	  			            echo "**** EDUCATIONS ****\n";
	  			            for ($n = 0; $n < $educationsCount; $n++)
	  			            	// print_r($result->possible_persons[0]->educations[$n]->display."\n");
	  			            	$social_media_educations = SocialMedia::create([
	  			            		'people_id' => $peopleId->id,
	  			            		'educations' => $result->possible_persons[0]->educations[$n]->display
	  			            	]);
	  			            // echo "\n";

	  			            // Echo user_ids -- the google one is crazy.
	  			            echo "**** USER_IDS ****\n";
	  			            for ($n = 0; $n < $userIdsCount; $n++)
	  			            	// print_r($result->possible_persons[0]->user_ids[$n]->content."\n");
	  			            	$social_media_userIds = SocialMedia::create([
	  			            		'people_id' => $peopleId->id,
	  			            		'user_ids' => $result->possible_persons[0]->user_ids[$n]->content
	  			            	]);
	  			            // echo "\n";

	  			            // Echo images (url).
	  			            echo "**** IMAGES ****\n";
	  			            for ($n = 0; $n < $imagesCount; $n++)
	  			            	// print_r($result->possible_persons[0]->images[$n]->url."\n");
	  			            	$social_media_images = SocialMedia::create([
	  			            		'people_id' => $peopleId->id,
	  			            		'images' => $result->possible_persons[0]->images[$n]->url 
	  			            	]);
	  			            // echo "\n";
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
