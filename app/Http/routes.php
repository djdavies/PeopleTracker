<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {

	Route::get('/', function () {
    	return view('layouts.master');
	});

    // Perform the search...


    // Show the Google Search page.
    Route::get('/googleSearch', function(Request $request) {
	    $googleResult = new App\GoogleResult;
	    $googleResult->name = $request->name;
	    $googleResult->save();

    	return redirect('/');
	});

		// return view('googleSearch');
});
