<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if (Auth::user()->usertype == '1') {
            return redirect()->route('app.itms.dashboard');
        } else {
            $user = Auth::user();
            $busunit = BusinessUnit::where('busid', $user->id)->get();

            return view("bu.dashboard", compact('busunit'));
        }
    }
    
}
