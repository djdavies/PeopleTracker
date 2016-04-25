<?php

use Illuminate\Database\Seeder;
use App\People;
use App\GoogleResults;

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
                echo $name . " already exists, creating results.";
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