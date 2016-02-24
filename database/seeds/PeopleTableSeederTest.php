<?php

use Illuminate\Database\Seeder;

class PeopleTableSeederTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Delete table content, to avoid duplicate entries.
    	// DB::table('People')->truncate();
    	// DB::table('google_results')->truncate();
    	
    	$people = App\People::create([
    		'name' => 'Daniel Davies'
    	]);
    	
        $google = App\GoogleResults::create([
            'title' => 'test',
            'url' => 'test',
            'content' => 'test',
            'people_id' => $people->id
            ]);

        $people->save();
        $google->save();
    }
}