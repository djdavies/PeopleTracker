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
                // echo $name . " already exists, creating results.";
            }    

            $peopleId = People::select('id')->where('name', '=', $name)->first();

            // echo "PeopleId is: " . $peopleId;

            // Echo gender. 
            echo "**** GENDER ****\n";
            for ($genderCount = 0; $genderCount < count($result->possible_persons[0]->gender); $genderCount++)
            	print_r($result->possible_persons[0]->gender->content."\n");
            echo "\n";

            // Echo addresses. NB: [0] on addresses, I would need to loop through all of them.
            echo "**** ADDRESSES ****\n";
            for ($addressesCount = 0; $addressesCount < count($result->possible_persons[0]->addresses); $addressesCount++)
            	print_r($result->possible_persons[0]->addresses[$addressesCount]->display."\n");
			echo "\n";


            // Echo jobs.
            echo "**** JOBS ****\n";
            for ($jobsCount = 0; $jobsCount < count($result->possible_persons[0]->jobs); $jobsCount++)
            	print_r($result->possible_persons[0]->jobs[$jobsCount]->display."\n");
            echo "\n";

            // Echo educations.
            echo "**** EDUCATIONS ****\n";
            for ($educationsCount = 0; $educationsCount < count($result->possible_persons[0]->educations); $educationsCount++)
            	print_r($result->possible_persons[0]->educations[$educationsCount]->display."\n");
            echo "\n";

            // Echo user_ids -- the google one is crazy.
            echo "**** USER_IDS ****\n";
            for ($user_idsCount = 0; $user_idsCount < count($result->possible_persons[0]->user_ids); $user_idsCount++)
            	print_r($result->possible_persons[0]->user_ids[$user_idsCount]->content."\n");
            echo "\n";

            // Echo images (url).
            echo "**** IMAGES ****\n";
            for ($imagesCount = 0; $imagesCount < count($result->possible_persons[0]->images); $imagesCount++)
            	print_r($result->possible_persons[0]->images[$imagesCount]->url."\n");
            echo "\n";

            // Iterate through objects and create results in DB.
            // for ($n = 0; $n < count($result->responseData->results); $n++) {
            //     $google = GoogleResults::create([
            //         'content' => $result->responseData->results[$n]->content,
            //         'people_id' => $peopleId->id,
            //         'title' => $result->responseData->results[$n]->title,
            //         'url' => $result->responseData->results[$n]->url,
            //         'query' => $result->query
            //     ]);
            // } // end for

        } else {
            echo "File not found: ";
        } 
 	}
} 	