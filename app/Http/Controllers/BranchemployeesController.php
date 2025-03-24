<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use Illuminate\Http\Request;
use App\Models\HeadOffice;
use App\Models\User;
use Hash;

class BranchemployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $role_id;

    protected $role_name;

    public function __construct(Request $request)
    {
        $role = $request->route()->parameter("role");
        $checkrole = $this->checkroleid($role);
        if ($checkrole == null) {
            abort(404);
        }
        $this->role_name = $checkrole["role_name"];
        $this->role_id = $checkrole["role_id"];

    }

    protected function checkroleid($role)
    {
        switch ($role) {
            case 'manager':
                return ["role_id" => 6, "role_name" => "Manager"];
            case 'branch_cashier':
                return ["role_id" => 7, "role_name" => "Branch Cashier"];
            case 'branch_recap':
                return ["role_id" => 8, "role_name" => "Branch Recap"];
            default:
                return null;
        }
    }

    public function index($role)
    {
        return view("dashboard.pages.employees.branch.branch_employees", ["role" => $role, "tittle" => "Management " . $this->role_name]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($role)
    {
        $head_offices = HeadOffice::all();

        return view('dashboard.pages.employees.branch.branch_employees_create', ['head_offices' => $head_offices, "role" => $role, "role_name" => $this->role_name, "tittle" => "Create ". $this->role_name]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $role)
    {
        $validatedata = $request->validate(rules: [
            'head_id' => "required|integer",
            'branch_id' => "required|integer",
            'user_name' => "required|string",
            'basic_salary' => "required|integer",
            'hometown' => "required",
            'phone_number' => "required|numeric",
            'sk' => "required|string",
            'email' => "required|email|unique:users,email",
            "password" => "required|confirmed|min:8",
            "password_confirmation" => "required"
        ]);


        if ($this->role_id == 6) {
            $checkuniqdata = User::where(["role_id" => $this->role_id, "branch_id" => $request->branch_id, "head_id" => $request->head_id])->get()->first();

            if ($checkuniqdata != null) {
                return redirect()->back()->withErrors("That Head Offices Has Have Leads")->withInput();
            }

        }

        $validatedata["role_id"] = $this->role_id;
        $validatedata["salary_date"] = date("d");

        User::create($validatedata);

        return redirect()->route("branch_employees", ["role" => $role])->with("success", "Success Add " . $this->role_name . " Data");


    }

    /**
     * Display the specified resource.
     */
    public function show($role, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($role, $id)
    {
        $branch_employee = User::with("head_office", "branch_office")->find($id);
        $head_offices = HeadOffice::all();

        return view("dashboard.pages.employees.branch.branch_employees_edit", ["role" => $role, "branch_employee" => $branch_employee, "head_offices" => $head_offices , "tittle" => "Edit ". $this->role_name, "role_name" => $this->role_name]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $role, $id)
    {
        $branch_employee = User::find($id);
        if ($request->email != $branch_employee->email) {
            $validatedata = $request->validate(rules: [
                'head_id' => "required|integer",
                'branch_id' => "required|integer",
                'user_name' => "required|string",
                'basic_salary' => "required|integer",
                'hometown' => "required",
                'phone_number' => "required|numeric",
                'sk' => "required|string",
                'email' => "required|email|unique:users,email",
            ]);

        } else {
            $validatedata = $request->validate(rules: [
                'head_id' => "required|integer",
                'branch_id' => "required|integer",
                'user_name' => "required|string",
                'basic_salary' => "required|integer",
                'hometown' => "required",
                'phone_number' => "required|numeric",
                'sk' => "required|string",
                'email' => "required|email",
            ]);

        }

        if ($this->role_id == 6) {
            if ($request->branch_id != $branch_employee->branch_id) {
                $checkuniqdata = User::where(["role_id" => $this->role_id, "branch_id" => $request->branch_id])->get()->first();

                if ($checkuniqdata != null) {
                    $checkuniqdata->update(["branch_id" => $branch_employee->branch_id]);
                }
            }


        }

        $branch_employee->update($validatedata);

        return redirect()->route("branch_employees", ["role" => $role])->with("success", "Success Edit " . $this->role_name . " Data  ");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($role, $id)
    {
        $branch_employee = User::findOrFail($id);
        $branch_employee->delete();

        return response()->json(["message" => "success"], 200);

    }

    public function renew_password_view(Request $request, $role, $id)
    {
        $branch_employee = User::find($id);

        return view("dashboard.pages.employees.branch.branch_employees_renew_password", ["role" => $role, "branch_employee" => $branch_employee, "tittle" => "Renew Password " . $this->role_name ]);
    }

    public function renew_password(Request $request, $role, $id)
    {
        $validatedata = $request->validate(rules: [
            "password" => "required|confirmed|min:8",
            "password_confirmation" => "required"
        ]);

        $branch_employee = User::find($id);
        $branch_employee->update(["password" => Hash::make($validatedata["password"])]);

        return redirect()->route("branch_employees", ["role" => $role])->with("success", "Success Renew " . $this->role_name . " Password");
    }
}
