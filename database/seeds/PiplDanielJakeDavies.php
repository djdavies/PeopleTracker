<?php

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