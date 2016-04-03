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
    	return view('home');
	});

    Route::get('/seeding', function () {
        return view('seeding');
    });

    Route::get('people', 'PeopleController@showAllPeople');
    Route::get('people/{id}/', 'PeopleController@showPerson');

    Route::get('people/{id}/prune', 'GoogleResultsController@showCorrectVals');

    Route::resource('people/googleresult/{id}/', 'GoogleResultsController@update');

    // Google People Search Page.
    Route::get('/googlesearch', function() {
        return view('googleSearch');
    });

    // The JSON results.
    Route::resource('googlesearchresults/', 'GoogleResultsController@create');

    // Pruned data.
    Route::resource('people/prune/{id}/', 'PrunesController@create');
    
});
