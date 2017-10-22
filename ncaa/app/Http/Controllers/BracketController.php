<?php

namespace App\Http\Controllers;

use App\Bracket;
use App\User;
use App\Team;
use App\Draft;
use App\DraftUser;
use App\DraftTeam;
use App\DraftRegion;
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
        // Collect users from session variable
        $users = $request->session()->get('users')[0];

        // Collect region locations from session variable
        $regions = Array(
            'upperLeft'  => $request->session()->get('region_ul')[0],
            'upperRight' => $request->session()->get('region_ur')[0],
            'lowerLeft'  => $request->session()->get('region_ll')[0],
            'lowerRight' => $request->session()->get('region_lr')[0]
        );

        // Collect teams from request variable
        $teams = $request->teams;

        // Save a new default draft and get the id
        $id = Draft::create()->id;

        // Save users
        foreach ($users as $user) {
            DraftUser::create(
                array(
                    'draft_id' => $id,
                    'user_id' => $user
                )
            );
        }

        // Save regions
        foreach ($regions as $location => $region) {
            DraftRegion::create(
                array(
                    'draft_id' => $id,
                    'location' => $location,
                    'region' => $region
                )
            );
        }

        // Save teams
        foreach ($teams as $regionSeed => $team) {
            $data = explode('-', $regionSeed);
            DraftTeam::create(
                array(
                    'draft_id' => $id,
                    'team_id' => $team,
                    'region' => $data[0],
                    'seed' => $data[1]
                )
            );
        }

        return redirect('/brackets');
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

    public function selectUsers()
    {
        $users = User::all();

        return view ('brackets.selectUsers', compact('users'));
    }

    public function selectRegions(Request $request)
    {
        return view ('brackets.selectRegions', compact('request'));
    }

    public function selectTeams(Request $request)
    {
        $teams = Team::all();

        return view ('brackets.selectTeams', compact('teams'), compact('request'));
    }

}
