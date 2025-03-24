<?php

namespace App\Http\Controllers;

use App\Models\Dropping;
use Illuminate\Http\Request;
use Auth;

class DroppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.dropping.dropping", ["tittle" => "Management Dropping"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dropping $dropping)
    {
        $droppingwithrelation = Dropping::with("loan_application.pdl", "loan_application.detail_resort.resorts.branch_offices.head_offices", "loan_application.user_action_by")->find($dropping->id);
        return view("dashboard.pages.dropping.dropping_show", ['dropping' => $droppingwithrelation, "tittle" => 'Detail Dropping']);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dropping $dropping)
    {
        return view('dashboard.pages.dropping.droppping_edit', ['dropping' => $dropping]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dropping $dropping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dropping $dropping)
    {
        //
    }

    public function action(Request $request, Dropping $dropping)
    {
        if ($request->has('Approve')) {
            $dropping->update(["status" => 2, "action_by" => auth::id(), "action_date" => date("Y-m-d H:i:s")]);
            Dropping::create(["loan_application_id" => $dropping->id]);
            return redirect()->back()->with('success', 'Success Approve Loan Application');
        }
        if ($request->has('Rejected')) {
            $dropping->update(["status" => 3, "action_by" => auth::id(), "action_date" => date("Y-m-d H:i:s")]);
            return redirect()->back()->with('success', 'Success Reject Loan Application');

        }

        return redirect()->back()->withErrors('none in the option');
    }
}
