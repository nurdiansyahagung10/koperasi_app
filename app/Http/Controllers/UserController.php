<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view("dashboard.pages.users", ["tittle" => "Management Users"]);
    }
}
