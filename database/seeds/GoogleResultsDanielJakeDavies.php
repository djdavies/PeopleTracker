<?php

use Illuminate\Database\Seeder;
use App\People;
use App\GoogleResults;

class GoogleResultsDanielJakeDavies extends Seeder
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

        $resultJson = Storage::get('daniel_jake_davies_.json');
        $result = json_decode($resultJson);

        if ($result) {
           	$people = People::create([
    			'name' => $result->name
    	]);
	        
	        for ($n = 0; $n < count($result->responseData->results); $n++) {
					$google = GoogleResults::create([
						'content' => $result->responseData->results[$n]->content,
						'people_id' => $people->id,
						'title' => $result->responseData->results[$n]->title,
						'url' => $result->responseData->results[$n]->url,
                        'query' => $result->query
					]);
			} // end for
        } // end if.
        $people->save();
    	$google->save();

        Storage::delete('daniel_jake_davies_.json');
    }
}
