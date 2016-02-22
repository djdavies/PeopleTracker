<?php

use Illuminate\Database\Seeder;

class GoogleResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$raw = File::get(storage_path() . '/GoogleResults.json')
        $json = json_decode($raw, true);

        if ($json) {
        	// TODO: retrieve name from web view, insert into People

        	if (! People::whereName('Daniel Davies')->count() ) {
        		$people = People::create([
        			'name' => 'Daniel Davies'
        			]);
        	}
        	else {
        		$people = People::whereName('Daniel Davies')->first();
        	}

        	// Add Google Results.

        	foreach ($json as $result) {
        		// Create GoogleResults Model.
        		if (! People::whereName($people))
        	}
        	DB::table('google_results')->insert([
        	])
        }
        
    }
}
