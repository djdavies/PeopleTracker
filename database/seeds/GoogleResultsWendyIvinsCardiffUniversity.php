<?php

use Illuminate\Database\Seeder;
use App\People;
use App\GoogleResults;

class GoogleResultsWendyIvinsCardiffUniversity extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resultJson = Storage::get('wendy_ivins_cardiff_university.json');
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