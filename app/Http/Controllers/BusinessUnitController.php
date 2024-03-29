<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BusinessUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $bus = BusinessUnit::where('userid', $user->userid)->get();
        return view('bu.application_index', compact('bus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bu = new BusinessUnit();
        return view('bu.application_form', compact('bu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'request'=> 'required',
            'name'=> 'required|string|max:50',
            'description'=> 'required|string|max:255',
        ]);

        $bu = new BusinessUnit();
        $bu->fill($request->all());
        $bu->userid = Auth::user()->userid;
        $bu->request = $request['request'] ? json_encode($request['request']) : json_encode([]);
        $bu->save();

        return redirect()->route('app.bu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessUnit $bu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessUnit $bu)
    {
        //CHECK STATUS & OTHER ID
        if($bu->status > 0 && Auth()->user()->userid){
            abort(404);
        }
        else{
            return view ('bu.application_form', compact('bu'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessUnit $bu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessUnit $bu)
    {
        $bu->delete();
        return redirect()->route('app.bu.index');
    }
}
