<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;
use App\GoogleResults;
use App\Prunes;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class GoogleResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //TODO: query as param.
        // $query = 'Daniel%20Davies%20cardiff%20university';
        $query = $request->input('query');
        $name = $request->input('name');

        $queryWithSpaces = $query;
        $nameWithSpaces = $name;

        // Concat name and query form values together, with %20s.
        $nameAndQuery = $name . ' ' .$query;

        // Convert spaces to %20
        $nameAndQueryUrlEncode = rawurlencode($nameAndQuery);

        // Looping it will fetch me more than 8 results, but contain duplicates. 
        // TODO: Doesn't seem to be a way to paginate results via Google search API?
        // for ( $i= 1; $i < 100; $i+8 ) {
        $url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&rsz=large&start=0&q==".$nameAndQueryUrlEncode;
        $body = file_get_contents($url);
        $json = json_decode($body);
        $filename = rawurldecode($nameAndQuery);
        $filenameUnderscores = str_replace(' ', '_', $filename);

        // Delete last '}' and replace with ,"query":"$query","name":"$name"}
        $replacement = ",\"query\":\"$queryWithSpaces\",\"name\":\"$name\"}";
        // The final string.
        $finalBody = substr($body, 0, -1).$replacement;
        Storage::put($filenameUnderscores . '.json', $finalBody);

    return view('googleSearchResults', ['query' => $query, 'name' => $name, 'filename' => $filename, 'filenameUnderscores' => $filenameUnderscores, 'json' => $json]);

        //  $i+=8;
    // }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get all distinct queries used for the specified id.
        $queryVals = GoogleResults::select('query')->where('people_id', '=', $id)->distinct()->get();

        $queryCorrect = [];

        foreach ($queryVals as $queryVal) {
            array_push($queryCorrect, $queryVal->query);
        }

        $correctsArr = [];

        foreach ($queryVals as $queryVal) {
             $queryValCorrects = 
                GoogleResults::
                    select('correct')
                    ->where([['query', '=', $queryVal->query],['people_id', '=', $id]])
                    ->get();

                                        // I get 8 results back, need to perform average here.
                    // But can't seem to access '->correct'
                    // **** denotes every 8 sections.
                    $strValCorrects = $queryValCorrects . "-";
                    $strValCorrects = str_replace('[{"correct":', '', $strValCorrects);
                    $strValCorrects = str_replace('},{"correct":', '', $strValCorrects);
                    $strValCorrects = str_replace('}]', '', $strValCorrects);
                    // echo $strValCorrects;
                    $corrects = explode('-', $strValCorrects, -1);
                    array_push($correctsArr, $corrects[0]);
        }                   

        $result = array_combine($queryCorrect, $correctsArr);
        print_r($result);

        return view ('currentResults',
            [
                'person' => People::findOrFail($id),
                'queryValCorrects' => $queryValCorrects,
                'queryVals' => $queryVals
            ]);
    }            


    public function showCorrectVals($id)
    {
        // Only get googleResults for the $id where correct is '1'.
        $googleResults = GoogleResults::wherePeopleId(1)->whereCorrect(1)->get();

        return view ('personPrune', 
            [
                'person' => People::findOrFail($id),
                'googleResults' => $googleResults 
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        GoogleResults::
            where('id', $id)
            ->update(['correct' => 1]);

    Session::flash('flash_message', 'Data updated to: CORRECT.');

    return Redirect::to(URL::previous() . "#$id");
    }

    public function updateIncorrect(Request $request, $id)
    {
        GoogleResults::
            where('id', $id)
            ->update(['correct' => 0]);

    Session::flash('flash_message', 'Data updated to: INCORRECT.');

    return Redirect::to(URL::previous() . "#$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
