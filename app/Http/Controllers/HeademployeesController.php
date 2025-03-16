<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HeadOffice;
use Hash;

class HeademployeesController extends Controller
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
            case 'head_leaders':
                return ["role_id" => 2, "role_name" => "Head Leader"];
            case 'coordinator':
                return ["role_id" => 3, "role_name" => "Coordinator"];
            case 'head_cashier':
                return ["role_id" => 4, "role_name" => "Head Cashier"];
            case 'head_recap':
                return ["role_id" => 5, "role_name" => "Head Recap"];
            default:
                return null;
        }
    }

    public function index($role)
    {
        return view("dashboard.pages.employees.head.head_employees", ["role" => $role, "tittle" => "Management " . $this->role_name]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($role)
    {

        if ($this->role_id == 2) {
            $head_offices = HeadOffice::whereDoesntHave('user', function ($query) {

                if ($this->role_id !== null) {
                    $query->where('role_id', $this->role_id);
                }

            })->get();

        } else {
            $head_offices = HeadOffice::all();
        }

        return view('dashboard.pages.employees.head.head_employees_create', ['head_offices' => $head_offices, "role" => $role, "role_name" => $this->role_name, "tittle" => "Create " . $this->role_name]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $role)
    {
        $validatedata = $request->validate(rules: [
            'head_id' => "required|integer",
            'user_name' => "required|string",
            'basic_salary' => "required|integer",
            'hometown' => "required",
            'phone_number' => "required|numeric",
            'sk' => "required|string",
            'email' => "required|email|unique:users,email",
            "password" => "required|confirmed|min:8",
            "password_confirmation" => "required"
        ]);

        $checkuniqdata = User::where(["role_id" => $this->role_id, "head_id" => $request->head_id])->get()->first();

        if ($checkuniqdata != null) {
            return redirect()->back()->withErrors("That Head Offices Has Have Leads")->withInput();
        }

        $validatedata["role_id"] = $this->role_id;
        $validatedata["salary_date"] = date("d");

        User::create($validatedata);

        return redirect()->route("head_employees", ["role" => $role])->with("success", "Success Add " . $this->role_name . " Data");


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
        $head_employee = User::with("head_office")->find($id);
        $head_offices = HeadOffice::all();

        return view("dashboard.pages.employees.head.head_employees_edit", ["role" => $role, "head_employee" => $head_employee, "head_offices" => $head_offices, "role_name" => $this->role_name, "tittle" => "Create " . $this->role_name]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $role, $id)
    {
        $head_employee = User::find($id);
        if ($request->email != $head_employee->email) {
            $validatedata = $request->validate(rules: [
                'head_id' => "required|integer",
                'user_name' => "required|string",
                'basic_salary' => "required|integer",
                'hometown' => "required",
                'phone_number' => "required|numeric",
                'sk' => "required|string",
                'email' => "required|email|unique",
            ]);

        } else {
            $validatedata = $request->validate(rules: [
                'head_id' => "required|integer",
                'user_name' => "required|string",
                'basic_salary' => "required|integer",
                'hometown' => "required",
                'phone_number' => "required|numeric",
                'sk' => "required|string",
                'email' => "required|email",
            ]);

        }

        if ($request->head_id != $head_employee->head_id) {
            $checkuniqdata = User::where(["role_id" => $this->role_id, "head_id" => $request->head_id])->get()->first();

            if ($checkuniqdata != null) {
                $checkuniqdata->update(["head_id" => $head_employee->head_id]);
            }
        }

        $head_employee->update($validatedata);

        return redirect()->route("head_employees", ["role" => $role])->with("success", "Success Edit " . $this->role_name . " Data  ");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($role, $id)
    {
        $head_employee = User::findOrFail($id);
        $head_employee->delete();

        return response()->json(["message" => "success"], 200);

    }

    public function renew_password_view(Request $request, $role, $id)
    {
        $head_employee = User::find($id);

        return view("dashboard.pages.employees.head.head_employees_renew_password")->with(["role" => $role, "head_employee" => $head_employee]);
    }

    public function renew_password(Request $request, $role, $id)
    {
        $validatedata = $request->validate(rules: [
            "password" => "required|confirmed|min:8",
            "password_confirmation" => "required"
        ]);

        $head_employee = User::find($id);
        $head_employee->update(["password" => Hash::make($validatedata["password"])]);

        return redirect()->route("head_employees", ["role" => $role])->with("success", "Success Renew " . $this->role_name . " Password");
    }
}
