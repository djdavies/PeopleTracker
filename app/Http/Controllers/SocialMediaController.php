<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\People;
use App\SocialMedia;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class SocialMediaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$socialMedias = SocialMedia::select('*')
    	->where('people_id', '=', $id)->get();

    	return view ('socialMedia',
    	    [
    	        'person' => People::findOrFail($id),
    	        'socialMedias' => $socialMedias,
    	    ]);
    }

    public function update(Request $request, $id)
    {
        SocialMedia::
            where('id', $id)
            ->update(['correct' => 1]);

    Session::flash('flash_message', 'Data updated to: CORRECT.');

    return Redirect::to(URL::previous() . "#$id");
    }

    public function updateIncorrect(Request $request, $id)
    {
        SocialMedia::
            where('id', $id)
            ->update(['correct' => 0]);

    Session::flash('flash_message', 'Data updated to: INCORRECT.');

    return Redirect::to(URL::previous() . "#$id");
    }
}
