<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\advance_payment;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\HeadOffice;
use App\Models\BranchOffice;
use App\Models\Resort;
use App\Models\DetailResort;
use App\Models\Members;
use App\Models\pdl;

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

    public function get_branch_office_from_head_office_for_employees(Request $request, $role, $head_id)
    {

        if ($role == "manager") {
            $branch_offices = BranchOffice::where("head_id", $head_id)->whereDoesntHave("user", function ($query) use ($role) {
                $query->where('role_id', $this->checkroleidbranch_office($role));
            })->get();

        } else {
            $branch_offices = BranchOffice::where("head_id", $head_id)->get();

        }


        return response()->json(['body' => $branch_offices, 'message' => 'success'], 200);
    }
    public function get_branch_office_from_head_office(Request $request, $head_id)
    {


        $branch_offices = BranchOffice::where("head_id", $head_id)->get();


        return response()->json(['body' => $branch_offices, 'message' => 'success'], 200);
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
        $resorts = Resort::with("pdl")->where("branch_id", $branch_id)->get();


        return response()->json(['body' => $resorts, 'message' => 'success'], 200);
    }
    public function resorts_have_pdl(Request $request, $branch_id)
    {
        $resorts = Resort::with("pdl")->where("branch_id", $branch_id)->whereHas("pdl")->get();


        return response()->json(['body' => $resorts, 'message' => 'success'], 200);
    }
    public function detailresorts(Request $request, $resort_id)
    {
        $detailresorts = DetailResort::with("resorts")->where("resort_id", $resort_id)->get();


        return response()->json(['body' => $detailresorts, 'message' => 'success'], 200);
    }
    public function members(Request $request)
    {
        $members = Members::with(["detail_resorts.resorts.pdl", "detail_resorts.resorts.branch_offices"])->get();

        return response()->json(['body' => $members, 'message' => 'success'], 200);
    }

    public function head_employees(Request $request, $role)
    {
        $heademployee = User::with(["head_office", "role"])->where("role_id", $this->checkroleidhead_office($role))->get();

        return response()->json(['body' => $heademployee, 'message' => 'success'], 200);
    }
    public function branch_employees(Request $request, $role)
    {
        $heademployee = User::with(["head_office", "role", "branch_office"])->where("role_id", $this->checkroleidbranch_office($role))->get();

        return response()->json(['body' => $heademployee, 'message' => 'success'], 200);
    }

    public function pdls(Request $request)
    {
        $pdl = Pdl::with(["head_office",  "branch_office", "resort"])->get();

        return response()->json(['body' => $pdl, 'message' => 'success'], 200);
    }

    public function get_pdls_from_branch(Request $request, $branch_id)
    {
        $pdl = Pdl::where("branch_id", $branch_id)->get();

        return response()->json(['body' => $pdl, 'message' => 'success'], 200);
    }

    public function advance_payments(Request $request)
    {
        $advance_payment = advance_payment::with(["user", "pdl", "detail_resort"])->get();

        return response()->json(['body' => $advance_payment, 'message' => 'success'], 200);
    }

    protected function checkroleidhead_office($role)
    {
        switch ($role) {
            case 'head_leaders':
                return 2;
            case 'coordinator':
                return 3;
            case 'head_cashier':
                return 4;
            case 'head_recap':
                return 5;
            default:
                return null;
        }
    }
    protected function checkroleidbranch_office($role)
    {
        switch ($role) {
            case 'manager':
                return 6;
            case 'branch_cashier':
                return 7;
            case 'branch_recap':
                return 8;
            case 'pdl':
                return 9;
            default:
                return null;
        }
    }


}
