<?php

namespace App\Http\Controllers\ITMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        
        return view("itms.dashboard");
    }
}
