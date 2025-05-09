<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamMembers = TeamMembers::all();
        return view('team-members.index', compact('teamMembers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = DB::table('teams')->get();
        return view('team-members.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TeamMembers::create($request->all());
        return redirect()->route('team-members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamMembers  $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMembers $teamMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamMembers  $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMembers $teamMember)
    {
        $teams = Team::all();
        return view('team-members.edit', compact('teamMember', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamMembers  $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamMembers $teamMember)
    {
        $teamMember->update($request->all());
        return redirect()->route('team-members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamMembers  $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMembers $teamMembers)
    {
        $teamMembers->delete();
        return redirect()->route('team-members.index');
    }
}
