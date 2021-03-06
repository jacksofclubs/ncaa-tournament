<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Session;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();

        return view ('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'school_name' => 'required|string|max:255',
            'short_name'  => 'required|string|max:8',
            'conference'  => 'required|string|max:255'
        ]);

        Team::create(request([
                'school_name', 'short_name', 'conference'
            ])
        );

        Session::flash('flash_message', 'Team ' . $request->school_name . ' created successfully!');

        return redirect('/teams');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate(request(), [
            'school_name' => 'required|string|max:255',
            'short_name'  => 'required|string|max:8',
            'conference'  => 'required|string|max:255'
        ]);

        $team->school_name = $request->school_name;
        $team->short_name  = $request->short_name;
        $team->conference  = $request->conference;

        $team->save();

        Session::flash('flash_message', 'Team ' . $team->school_name . ' updated successfully!');

        return redirect('/teams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        // $this->authorize('destroy', $user);
        $team->delete();
        // Send the confirmation message to the redirect page, where it can be accessed
        Session::flash('flash_message', 'Team ' . $team->school_name . ' deleted successfully!');

        return redirect('/teams');
    }
}
