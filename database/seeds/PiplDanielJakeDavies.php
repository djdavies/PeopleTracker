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

            // Perform the count here, so it's not in a loop iterating over a fairly large array, for performance.
            // Excuse the 'magic number', it's simply because I always want only the first person, as it's the most likely hit. The other possible persons won't have an nth 
            // array element to iterate, either. That is, some for say 'educations' will be
            // blank, and it'll fail.
 			$addressesCount = count($result->possible_persons[0]->addresses);
 			$genderCount = count($result->possible_persons[0]->gender);
 			$jobsCount = count($result->possible_persons[0]->jobs);
 			$educationsCount = count($result->possible_persons[0]->educations);

            // Echo gender. 
            echo "**** GENDER ****\n";

        	print_r($result->possible_persons[0]->gender->content."\n");
            echo "\n";

            // Echo addresses. NB: [$possible_personsCount] on addresses, I would need to 	loop through all of them.
            echo "**** ADDRESSES ****\n";	
            for ($n = 0; $n < $addressesCount; $n++)
            	print_r($result->possible_persons[0]->addresses[$n]->display."\n");
			echo "\n";


            // Echo jobs.
            echo "**** JOBS ****\n";
            for ($n = 0; $n < $jobsCount; $n++)
            	print_r($result->possible_persons[0]->jobs[$n]->display."\n");
            echo "\n";

            // Echo educations.
            echo "**** EDUCATIONS ****\n";
            for ($n = 0; $n > $educationsCount; $n++); $educationsCount++)
	   //          	print_r($result->possible_persons[$possible_personsCount]->educations[$educationsCount]->display."\n");
	   //          echo "\n";

	   //          // Echo user_ids -- the google one is crazy.
	   //          echo "**** USER_IDS ****\n";
	   //          for ($user_idsCount = 0; $user_idsCount < count($result->possible_persons[$possible_personsCount]->user_ids); $user_idsCount++)
	   //          	print_r($result->possible_persons[$possible_personsCount]->user_ids[$user_idsCount]->content."\n");
	   //          echo "\n";

	   //          // Echo images (url).
	   //          echo "**** IMAGES ****\n";
	   //          for ($imagesCount = 0; $imagesCount < count($result->possible_persons[$possible_personsCount]->images); $imagesCount++)
	   //          	print_r($result->possible_persons[$possible_personsCount]->images[$imagesCount]->url."\n");
	   //          echo "\n";

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