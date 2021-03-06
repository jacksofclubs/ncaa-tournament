<?php

namespace App\Http\Controllers;

use App\Draft;
use App\User;
use App\Team;
use App\DraftUser;
use App\DraftTeam;
use App\DraftRegion;
use Illuminate\Http\Request;
use Session;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drafts = Draft::all();
        return view ('drafts.index', compact('drafts'));

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

        return redirect('/drafts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function show(Draft $draft)
    {
        return view('drafts.show', compact('draft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function edit(Draft $draft)
    {
        return view('drafts.edit', compact('draft'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Draft $draft)
    {
        $this->validate(request(), [
            'short_description' => 'required|string|max:255',
            'long_description'  => 'required|string|max:255',
            'seconds_per_round' => 'required|string|max:255'
        ]);

        $draft->short_description = $request->short_description;
        $draft->long_description  = $request->long_description;
        $draft->seconds_per_round = $request->seconds_per_round;

        $draft->save();

        Session::flash('flash_message', 'Draft ' . $draft->id . ' updated successfully!');

        return redirect('/drafts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Draft $draft)
    {
        // TODO perform this in a more efficient manner
        \DB::delete('DELETE FROM draft_users   WHERE draft_id = ' . $draft->id);
        \DB::delete('DELETE FROM draft_teams   WHERE draft_id = ' . $draft->id);
        \DB::delete('DELETE FROM draft_regions WHERE draft_id = ' . $draft->id);
        $draft->delete();
        // Send the confirmation message to the redirect page, where it can be accessed
        Session::flash('flash_message', 'Draft ' . $draft->id . ' deleted successfully!');

        return redirect('/drafts');
    }

    public function selectUsers()
    {
        $users = User::all();

        return view ('drafts.selectUsers', compact('users'));
    }

    public function selectRegions(Request $request)
    {
        return view ('drafts.selectRegions', compact('request'));
    }

    public function selectTeams(Request $request)
    {
        $teams = Team::all();

        return view ('drafts.selectTeams', compact('teams'), compact('request'));
    }

    public function prepare(Draft $draft)
    {
        $draft_users   = DraftUser::where('draft_id',   $draft->id)->get();

        $draftUserIds = [];
        foreach ($draft_users as $draft_user) {
            $draftUserIds[] = $draft_user->user_id;
        }
        $users = User::whereIn('id', $draftUserIds)->get();

        return view('drafts.run', compact(['draft', 'users']));
    }

    public function runDraft(Request $request)
    {
        $draft         = Draft::find($request->draftId);
        $draft_regions = DraftRegion::where('draft_id', $draft->id)->get();
        $draft_teams   = DraftTeam::where('draft_id', $draft->id)->get();
        $draft_users   = DraftUser::where('draft_id', $draft->id)->get();

        $draftTeamIds = [];
        foreach ($draft_teams as $draft_team) {
            $draftTeamIds[] = $draft_team->team_id;
        }
        $teams = Team::whereIn('id', $draftTeamIds)->get();

        $draftUserIds = [];
        foreach ($draft_users as $draft_user) {
            $draftUserIds[] = $draft_user->user_id;
        }
        $users = User::whereIn('id', $draftUserIds)->get();

        $selectionOrder = $request->ranks;

        return view(
            'drafts.runDraft', 
            compact(['draft', 'teams', 'users', 'selectionOrder'])
        );
    }
}
