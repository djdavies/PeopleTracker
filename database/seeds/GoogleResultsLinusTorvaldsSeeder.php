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

        $resultJson = File::get(storage_path() . '/oliver_cumming_cardiff.json');
        $result = json_decode($resultJson);

        if ($result) {
        	// TODO: the name will be supplied via the 'query' in the JSON or Web UI.
           	$people = People::create([
    			'name' => $result->name
    	]);

            echo "QUERY: " . $result->query;
	        
	        for ($n = 0; $n < count($result->responseData->results); $n++) {
					$google = App\GoogleResults::create([
						'content' => $result->responseData->results[$n]->content,
						'people_id' => $people->id,
						'title' => $result->responseData->results[$n]->title,
						'url' => $result->responseData->results[$n]->url,
                        'query' => $result->query,
					]);
                    echo "N is now: " . $n . "\n";
			} // end for
        } // end if.
        $people->save();
    	$google->save();
    } // end func.
} // end class.