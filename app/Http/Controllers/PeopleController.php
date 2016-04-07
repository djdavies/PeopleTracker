<?php

namespace App\Http\Controllers;

use App\People;
use App\GoogleResults;
use App\Prunes;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    /**
     * Show the profile for the given person.
     *
     * @param  int  $id
     * @return Response
     */
    public function showPerson($id)
    {
        $googleResults = GoogleResults::wherePeopleId($id)->get();

        return view('person', 
            [
                'person' => People::findOrFail($id),
                'googleResults' => $googleResults
            ]);
    }

    // Show profiles for all users: name and query.
    public function showAllPeople() {

        $people = People::all();

        return view ('people', ['people' => $people]);
    }
}