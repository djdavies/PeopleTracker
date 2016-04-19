<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GoogleResults;
use App\People;
use App\Prunes;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

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
