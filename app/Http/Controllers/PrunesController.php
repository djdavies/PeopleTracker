<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GoogleResults;
use App\People;
use App\Prunes;
use Session;
use Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

class PrunesController extends Controller
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
    public function create(Request $request, $id)
    {
        if ($request) {
            $pruned = $request->input('data');
            // echo $pruned;
            // Get comma-separated values from the form.
            $prunedArray = explode(',', $pruned);
            // Insert values into DB.
            foreach ($prunedArray as $pruneData) {
                $prune = new Prunes;
                $prune->people_id = $id;
                $prune->data = $pruneData;
                $prune->save();
            }

            Session::flash('flash_message', 'Added prune data!');
            return redirect()->back();
        }
    }

    public function createClassification(Request $request, $id)
    {
        if ($request) {
            $classification = $request->input('classification');

            Prunes::
               where('id', $id)
               ->update(['classification' => $classification]); 

            Session::flash('flash_message', 'Pruned data was classified as: ' . $classification);
        }

       return Redirect::to(URL::previous() . "#$id");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show pruned data for person.
        $pruneds = Prunes::select('data', 'id', 'classification')->where('people_id', '=', $id)->distinct()->get();

        return view ('pruned', [
            'person' => People::findOrFail($id),
            'pruneds' => $pruneds,
            ]);
    }

    public function showSuggested($id)
    {
        $suggesteds = Prunes::select('data', 'id', 'classification')->where('people_id', '=', $id)->distinct()->get();

        return view ('suggestedSearch', [
            'person' => People::findOrFail($id),
            'suggesteds' => $suggesteds,
            ]);
    }

    public function suggestedSearch(Request $request, $id)
    {
        // Select person id via id.
        $name = People::select('name')->where('id', '=', $id)->get();

        foreach ($name as $key => $value) {
            $nameQuery = $value->name;
        }

        // All values of checkboxes.
        $input = $request->all();

        // Remove first element (_token) of array.
        $stack = $input;
        $tokenRm = array_shift($stack);

        // Change underscores to spaces, add values to array.
        $queries = [];
        foreach ($stack as $key => $value) {
            $us2sp = str_replace('_', ' ', $key);
            array_push($queries, $us2sp);
        }

        // Create a string out of the array, space separated.
        $joinQueries = implode(' ', $queries);
        // Convert spaces to %20s
        $queriesFinal = rawurlencode($joinQueries);
        $nameFinal = rawurlencode($nameQuery);

        $url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&rsz=large&start=0&q==".$nameFinal."%20".$queriesFinal;

        $body = file_get_contents($url);
        $json = json_decode($body);
        $filename = rawurldecode($nameFinal);
        $filenameUnderscores = str_replace(' ', '_', $filename);

        // Delete last '}' and replace with ,"query":"$query","name":"$name"}
        $replacement = ",\"query\":\"$joinQueries\",\"name\":\"$nameQuery\"}";
        // The final string.
        $finalBody = substr($body, 0, -1).$replacement;
        Storage::put($filenameUnderscores . '_suggested' . '.json', $finalBody);

        return view('suggestedSearchResults', ['query' => $joinQueries, 'name' => $nameQuery, 'filename' => $filename, 'filenameUnderscores' => $filenameUnderscores, 'json' => $json]);
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
        // 
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
