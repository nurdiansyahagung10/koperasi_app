<?php

namespace App\Http\Controllers;

use App\Models\DetailResort;
use App\Models\Dropping;
use App\Models\LoanApplication;
use Auth;
use Illuminate\Http\Request;
use App\Models\HeadOffice;
use App\Models\Members;

class LoanApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.loan_application.loan_application", ["tittle" => "Management Loan Application"]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $head_office = HeadOffice::all();
        $members = Members::whereHas('loan_applications', function ($query) {
            $query->where("status", "Selesai");
        })->orDoesntHave("loan_applications")->get();

        return view("dashboard.pages.loan_application.loan_application_create", ["tittle" => "Create Loan Application", "head_offices" => $head_office, "members" => $members]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'detail_resort_id' => 'required|numeric',
            'member_id' => 'required|numeric',
            'binding_letter' => 'required|string',
            'binding_letter_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nominal_loan_application' => 'required|numeric'
        ]);

        $checkhaveloanapplicationsnotfinished = LoanApplication::where('member_id', $request->member_id)->whereNot("status", "Selesai")->get();

        if (count($checkhaveloanapplicationsnotfinished) != 0) {
            return redirect()->back()->with("error", "That Member Have Loan Appliction Not Finished ");
        }

        $detail_resort = DetailResort::with('resorts.branch_offices')->findOrFail($request->detail_resort_id);
        $pdl_id = $detail_resort->resorts->pdl_id;
        $validate["pdl_id"] = $pdl_id;
        $validate["nominal_admin"] = $request->nominal_loan_application * ($detail_resort->resorts->branch_offices->admin_charge / 100);
        $validate["nominal_provisi"] = $request->nominal_loan_application * ($detail_resort->resorts->branch_offices->provisi_charge / 100);
        $validate["nominal_deposite"] = $request->nominal_loan_application * ($detail_resort->resorts->branch_offices->deposite / 100);
        $validate["nominal_pure_dropping"] = $request->nominal_loan_application - ($validate["nominal_admin"] + $validate["nominal_provisi"] + $validate["nominal_deposite"]);

        if ($request->hasFile('binding_letter_image')) {
            $validate['binding_letter_image'] = $request->file('binding_letter_image')->store('img/loans', 'public');
        }

        LoanApplication::create($validate);

        return redirect()->route("loan_applications")->with("success", "Success Create Loan Applications Data");

    }

    /**
     * Display the specified resource.
     */
    public function show(LoanApplication $loanApplication)
    {
        LoanApplication::with("pdl", "detail_resort.resorts.branch_offices.head_offices", "user_action_by")->find($loanApplication->id);

        return view("dashboard.pages.loan_application.loan_application_show", ['loan_application' => $loanApplication, "tittle" => 'Detail Loan Applicaiton']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanApplication $loanApplication)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoanApplication $loanApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanApplication $loanApplication)
    {
    }

    public function action(Request $request, LoanApplication $loanApplication)
    {
        if ($request->has('Approve')) {
            $loanApplication->update(["status" => 2, "action_by" => auth::id(), "action_date" => date("Y-m-d H:i:s")]);
            Dropping::create(["loan_application_id" => $loanApplication->id]);
            return redirect()->back()->with('success', 'Success Approve Loan Application');
        }
        if ($request->has('Rejected')) {
            $loanApplication->update(["status" => 3, "action_by" => auth::id(), "action_date" => date("Y-m-d H:i:s")]);
            return redirect()->back()->with('success', 'Success Reject Loan Application');

        }

        return redirect()->back()->withErrors('none in the option');
    }
}
