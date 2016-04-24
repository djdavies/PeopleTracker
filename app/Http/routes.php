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

	// Stand alone pages.
    Route::get('/', function () {
    	return view('home');
	});
    Route::get('/seeding', function () {
        return view('seeding');
    });

    Route::get('/people/{id}/results', 'GoogleResultsController@show'); 

    Route::get('/currentresults', function () {
        return view('currentResults');
    });

    // People show.
    Route::get('people', 'PeopleController@showAllPeople');
    Route::get('people/{id}/', 'PeopleController@showPerson');
    
    // Google results update.
    Route::resource('googleresult/{id}/correct', 'GoogleResultsController@update');
    Route::resource('googleresult/{id}/incorrect', 'GoogleResultsController@updateIncorrect');
    
    // Google Peform People Search Page and create reuslts.
    Route::get('/googlesearch', function() {
        return view('googleSearch');
    });
    Route::resource('googlesearchresults/', 'GoogleResultsController@create');
    
    // Pruning data.
    Route::get('people/{id}/prune', 'GoogleResultsController@showCorrectVals');
    Route::resource('people/prune/{id}/', 'PrunesController@create');
    Route::get('people/{id}/pruned', 'PrunesController@show');
    Route::resource('prunedata/classify/{id}/', 'PrunesController@createClassification');
    Route::get('/people/{id}/suggested/', 'PrunesController@showSuggested');

    // Suggested search.
    Route::resource('suggestedSearch/{id}/', 
        'PrunesController@suggestedSearch');
});
