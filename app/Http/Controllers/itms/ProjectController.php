<?php

namespace App\Http\Controllers\itms;

use App\Models\User;
use App\Models\System;
use App\Models\Project;
use App\Models\Developer;
use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();
        // $users = User::all();
        $users = User::where('usertype', 1)->get();
        $projects = Project::all();
        $dev = User::where('usertype', 2)->get();
        // $bus = BusinessUnit::all();
        // $projects = Project::where('userid', $user->id)->get();
        // $bus = BusinessUnit::where('userid', $user->id)->get();
        // dd($bus);

        // return view("itms.project_index", compact('projects','bus','user'));
        return view("itms.project_index", compact('projects','users','dev'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $system = new System();
        $bu = BusinessUnit::all();
        // $user = User::where('usertype', 1)->get();
        // $dev = User::where('usertype', 2)->get();
        $users = User::all();
        
        return view('itms.project_form', compact('project','bu','users','system'));
        // return view('itms.project_form', compact('project','bu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'userid'=> 'required|exists:bunits,userid',
            // 'bunitid'=> 'required|exists:users,bunitid',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'status' => 'nullable',
            'leaddev' => 'nullable',
        ]);

        $system = new System();
        $system->fill($request->all());
        $system->save();

        $duration =  $request->input('duration');
        $project = new Project();
        $project->fill($request->all());
        $project->duration = $duration;
        $project->bunitid = $request['bunitid'];
        $project->userid = $request['userid']; //DARI TABLE USERS
        $project->businessUnit->status = 0; //RELEASE
        $project->projectstatus = 0;
        $project->user->status = 0; //UNAVAILABLE
        $project->businessUnit->save();
        $project->user->save();
        // $project->system->sysid = $request['sysid'];
        $project->system()->associate($system);
        $project->save();

        return redirect()->route('app.itms.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        if($request['action'] == 'approve'){
            $project->status='1';
            // Update lot status to 0 once booking is approved
            // 0 = UNAVAILABLE
            BusinessUnit::where('lotid', $project->lotid)->update(['status' => 0]);
        }elseif( $request['action'] == 'reject'){
            $project->status='2';
            // Update lot status to 1 once booking is reject
            // 1 = Available
            BusinessUnit::where('busid', $project->id)->update(['status' => 1]);
        }
        $project->save();
        return redirect()->route('app.admin.booking.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('app.itms.project.index');
    }
}
