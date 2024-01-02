<?php

namespace App\Http\Controllers\ITMS;

use App\Http\Controllers\Controller;
use App\Models\BusinessUnit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $busunit = BusinessUnit::all();

        return view("itms.dashboard", compact('busunit'));
    }
}
