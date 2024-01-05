<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\system;
use App\Models\Project;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $systems = System::all();
        $projects = Project::all();
        // $bunit = BusinessUnit::all();
        return view("itms.system_index", compact('systems','projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $system = new System();
        $project = Project::all();
        $bunit = BusinessUnit::all();
        
        return view('itms.system_form', compact('system', 'project','bunit'));
        // return view('itms.system_form', compact('system'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'userid'=> 'required|exists:bunits,userid',
            // 'bunitid'=> 'required|exists:users,bunitid',
            'methodology' => 'nullable',
            'paltform' => 'nullable',
            'deployment' => 'nullable',
        ]);
        $system = new System();
        $system->fill($request->all());
        $system->proid = $request['proid'];
        // $system->project->projectstatus = 0; //RELEASE
        dd($system);
        $system->businessUnit->status = 0; //RELEASE
        $system->businessUnit->save(); 
        $system->project->save();
        $system->save();

        return redirect()->route('app.itms.system.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(system $system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(system $system)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, system $system)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(system $system)
    {
        //
    }
}
