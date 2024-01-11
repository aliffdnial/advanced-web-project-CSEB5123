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
        $users = User::where('usertype', 1)->get();
        $projects = Project::all();
        $dev = User::where('usertype', 2)->get();
        $systems = System::all();

        return view("itms.project_index", compact('projects','users','dev','systems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $system = new System();
        $bu = BusinessUnit::all();
        $users = User::where('usertype', 1)->get();
        $devs = User::where('usertype', 2)->get();
       
        return view('itms.project_form', compact('project','bu','users','devs','system'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => 'nullable',
        ]);

        $duration =  $request->input('duration');
        $project = new Project();
        $project->fill($request->all());
        $project->duration = $duration;
        $project->bunitid = $request['bunitid'];
        $project->userid = $request['userid']; //DARI TABLE USERS

        // UPDATE BUNIT STATUS
        $project->businessUnit->status = 0; //RELEASE
        $project->businessUnit->save();

        // UPDATE USER STATUS
        $project->user->status = 0; //UNAVAILABLE
        $project->user->save();
        $project->save();

        $system = new System();
        $system->fill($request->all());
        $system->project()->associate($project);
        $system->save();

        return redirect()->route('app.itms.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $system = System::all();
        
        $availableDevelopers = User::where('usertype', 2)->where('status', 1)->get(); // Assuming usertype 2 is developer
        return view('itms.project_show', compact('project','system', 'availableDevelopers'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('app.itms.project.index');
    }

    public function attachDevelopers(Request $request, Project $project)
    {
        $developerIds = $request->input('developer_ids');
        $project->developers()->attach($developerIds);
        // User::whereIn('userid', $developerIds)->update(['status' => 0]);
        
        return redirect()->back();
    }

    public function detachDevelopers(Request $request, Project $project)
    {
        $developerIds = $request->input('developer_ids');
        $project->developers()->detach($developerIds);
        // User::whereIn('userid', $developerIds)->update(['status' => 1]);

        return redirect()->back();

        // $developerIds = $request->input('developer_ids');

        // // Check if developerIds is not null or empty
        // if (!empty($developerIds)) {
        //     // Update the status of detached developers
        //     User::whereIn('userid', $developerIds)->update(['status' => 1]);
        // }
    
        // // Detach developers
        // $project->developers()->detach($developerIds);
    
        // return redirect()->back();
    }

    public function progress(Project $project)
    {
        if (auth()->user()->userid == $project->user->userid) {
            $system = System::all();
            return view("itms.progress_form", compact('project', 'system'));
        } else {
            // If not the lead developer, redirect or display an error
            return redirect()->route('app.itms.project.index')->withErrors('error', 'You do not have permission to update progress.');
        }
    }
    public function progressprocess(Request $request, $project)
    {
        $project = Project::findOrFail($project);

        $this->validate($request, [
            'progress_description' => 'nullable|string|max:255',
            'progress_date'=> 'nullable|date', //10mb MAX
        ]);

        $project->fill($request->all());
        $progress_description =  $request->input('progress_description');
        $progress_date =  $request->input('progress_date');
        $status =  $request->input('status');
        $project->progress_description = $progress_description;
        $project->progress_date = $progress_date;
        $project->status = $status;

        if($status == 3){
            $project->user->status = 1; //UNAVAILABLE
            $project->user->save();
        }
        
        $project->save();
        return redirect()->route('app.itms.project.index');
    }
}
