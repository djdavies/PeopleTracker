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
    	// DB::table('google_results')->insert([
    	// 	'title' => 'D-squared Digest -- FOR bigger pies and shorter hours and <b>...</b>',
     //    	'url' => 'http://blog.danieldavies.com/',
     //    	'content' => 'Can he really be saying that? Is that bastard Davies blaming the victim? ..... If you \nliked this &quot;<b>Daniel Davies</b>&quot; website, you might be interested in. &quot;Danux&quot;, the web\u00a0...'
    	// ]);

        $people->save();
        $google->save();
    }
}