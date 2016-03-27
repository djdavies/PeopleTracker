<?php

use Illuminate\Database\Seeder;

class GoogleResultsDanielDaviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Clear data, to avoid dupes.
    	// DB::table('people')->truncate();
    	// DB::table('google_results')->truncate();

    	// $people = App\People::whereName('Daniel Davies')->first();

        $resultJson = File::get(storage_path() . '/GoogleResults.json');
        $result = json_decode($resultJson);

        if ($result) {
        	// TODO: the name will be supplied via web UI.
           	$people = App\People::create([
    		'name' => 'Daniel Davies Seeding'
    	]);
        	// Add results.
        	foreach ($result as $object) {
				$google = App\GoogleResults::create([
					'content' => $object->content,
					'people_id' => $people->id,
					'title' => $object->title,
					'url' => $object->url,
			    ]);
			} // end foreach
        } // end if.
        $people->save();
    	$google->save();
    } // end func.
} // end class.