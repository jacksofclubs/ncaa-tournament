<?php

namespace App\Http\Controllers;

use App\Bracket;
use Illuminate\Http\Request;

class BracketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brackets = [];
        return view ('brackets.index', compact('brackets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save a new instance of Bracket
        // use short and long description from draft
        // active and round automatically set to 0

        // get the id of the newly created bracket
        // foreach team in the draft(64 of them)
            // save a new instance of bracket_mapping
            // bracket_id is the id of newly created bracket
            // user_id and team_id get from $request
            // region and seed get from draft_teams
            // points and wins set to 0
            // active set to 1
            // save the bracket_mapping instance

        // delete the draft from draft
        // could also delete everything that matches from draft_* tables, but may need some of that or save it elsewhere

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bracket  $bracket
     * @return \Illuminate\Http\Response
     */
    public function show(Bracket $bracket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bracket  $bracket
     * @return \Illuminate\Http\Response
     */
    public function edit(Bracket $bracket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bracket  $bracket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bracket $bracket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bracket  $bracket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bracket $bracket)
    {
        //
    }
}
