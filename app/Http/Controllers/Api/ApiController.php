<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\HeadOffice;
use App\Models\BranchOffice;
use App\Models\Resort;

class ApiController extends Controller
{
    public function user()
    {
        $user = auth()->user();

        return response()->json(['body' => $user, 'message' => 'success'], 200);
    }

    public function all_users()
    {
        $users = user::with("role")->get();

        return response()->json(['body' => $users, 'message' => 'success'], 200);
    }
    public function role(Request $request)
    {
        $roles = Role::all();

        return response()->json(['body' => $roles, 'message' => 'success'], 200);
    }

    public function get_role(Request $request, $id)
    {
        $roles = Role::where("id", $id)->get();

        return response()->json(['body' => $roles, 'message' => 'success'], 200);
    }


    public function permissions(Request $request)
    {
        $permissions = [["id" => "1", "name_permissions" => "view_roles"], ["id" => "2", "name_permissions" => "set_permissions"],];

        return response()->json(['body' => $permissions, 'message' => 'success'], 200);
    }

    public function head_offices(Request $request)
    {
        $head_offices = HeadOffice::all();

        return response()->json(['body' => $head_offices, 'message' => 'success'], 200);
    }

    public function branch_offices(Request $request)
    {
        $branch_offices = BranchOffice::with("head_offices")->get();


        return response()->json(['body' => $branch_offices, 'message' => 'success'], 200);
    }
    public function resorts(Request $request, $branch_id)
    {
        $resorts = Resort::where("branch_id", $branch_id)->get();


        return response()->json(['body' => $resorts, 'message' => 'success'], 200);
    }
}
