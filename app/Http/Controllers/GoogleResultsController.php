<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;
use App\GoogleResults;
use App\Data;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;

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

        // Convert spaces to %20
        $query = rawurlencode($query);

        // Looping it will fetch me more than 8 results, but contain duplicates.
        // for ( $i= 1; $i < 100; $i+8 ) {
        $url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&rsz=large&start=0&q==".$query;
        $body = file_get_contents($url);
        $json = json_decode($body);

        for($x=0;$x<count($json->responseData->results);$x++){
            echo "<b>Result ".($x+1)."</b>";
            echo "<br>URL: ";
            echo $json->responseData->results[$x]->url;
            echo "<br>VisibleURL: ";
            echo $json->responseData->results[$x]->visibleUrl;
            echo "<br>Title: ";
            echo $json->responseData->results[$x]->title;
            echo "<br>Content: ";
            echo $json->responseData->results[$x]->content;
            echo "<br><br>";
    }

    File::append('doesthiswork', 'test');



    return view('googleSearchResults', ['query' => $query]);
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
        //TODO: make the 'incorrect' button set it back to 0.
        // Another function possibly easiest way -- most elegant
        // would be to check if it's 0 or 1, etc...
        GoogleResults::
            where('id', $id)
            ->update(['correct' => 1]);
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
