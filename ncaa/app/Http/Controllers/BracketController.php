<?php

namespace App\Http\Controllers;

use DB;
use App\Bracket;
use App\Draft;
use App\BracketMapping;
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
        $draft = Draft::find($request->draftId);

        $bracket = Bracket::create([
            'short_description' => $draft->short_description,
            'long_description'  => $draft->long_description
        ]);

        foreach ($request->usersteams as $userId => $teamArray) {
            foreach ($teamArray as $teamId) {
                $draftTeam = DB::table('draft_teams')->where('draft_id', $draft->id)->where('team_id', $teamId)->first();

                BracketMapping::create([
                    'bracket_id' => $bracket->id,
                    'user_id'    => $userId,
                    'team_id'    => $teamId,
                    'region'     => $draftTeam->region,
                    'seed'       => $draftTeam->seed,
                ]);
            }

            // points and wins set to 0 by default in sql - set this in migration
            // active set to 1 by default in sql - set this in migration
            // save a new instance of bracket_mapping
        }

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
