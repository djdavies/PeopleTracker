<?php

use Illuminate\Database\Seeder;
use App\People;

class GoogleResultsLinusTorvaldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Clear data, to avoid dupes.
    	// Truncate the person, by name variable (TODO).
    	// DB::table('people')->truncate();
    	// Truncate all results related to this person (TODO).
    	// DB::table('google_results')->truncate();

    	// $people = App\People::whereName('Daniel Davies')->first();

        $resultJson = File::get(storage_path() . '/oliver_cumming.json');
        $result = json_decode($resultJson);

        if ($result) {
        	echo "Result found true";
        	// TODO: the name will be supplied via the 'query' in the JSON or Web UI.
           	$people = People::create([
    			'name' => 'Oliver Cumming'
    	]);

	        $numResults = count($result->responseData->results);
	        echo "Number of results: " . $numResults;
	        
	        for ($n = 0; $n < $numResults; $n++) {
		        foreach ($result as $object) {
					$google = App\GoogleResults::create([
						'content' => $result->responseData->results[$n]->content,
						'people_id' => $people->id,
						'title' => $result->responseData->results[$n]->title,
						'url' => $result->responseData->results[$n]->url,
					]);
					$n+=1;
					echo "N is now: " . $n;
				} //end foreach
			} // end for
        } // end if.
        $people->save();
    	$google->save();
    } // end func.
} // end class.