<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dashboard;
use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if (Auth::user()->usertype == '0' || Auth::user()->usertype == '2') {
            return redirect()->route('app.itms.dashboard');
        }else {
            $users = Auth::user();
            // $users = User::where('usertype', 1)->get();
            $busunit = BusinessUnit::where('userid', $users->userid)->get();
            // dd($busunit);

            return view("bu.dashboard", compact('busunit'));
        }
    }
}
