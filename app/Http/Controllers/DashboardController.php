<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function homeview(){
        return view("dashboard.pages.home");
    }

}
