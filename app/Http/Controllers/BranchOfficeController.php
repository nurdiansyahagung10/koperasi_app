<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use Illuminate\Http\Request;
use App\Models\HeadOffice;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.branch_offices.branch_offices");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $head_offices = HeadOffice::all();
        return view("dashboard.pages.branch_offices.branch_offices_create")->with(["head_offices" => $head_offices]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'branch_name' => "required|string|unique:branch_offices,branch_name",
            'city_or_regency' => "required|string",
            'district' => "required|string",
            'village' => "required|string",
            'rt_and_rw' => "required|numeric",
            'street_or_building_name' => "required",
            'phone_number' => "required|numeric",
            'head_id' => "required|numeric",
            'maxresort' => "required|numeric",
            'service_charge' => "required|numeric",
            'admin_charge' => "required|numeric",
            'comision_charge' => "required|numeric",
            'deposite' => "required|numeric",
        ]);

        BranchOffice::create($validatedata);

        return redirect()->route("branch_offices")->with("success", "Success Add Branch Office Data");
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchOffice $branchOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchOffice $branchOffice)
    {
        $head_offices = HeadOffice::all();
        return view("dashboard.pages.branch_offices.branch_offices_edit")->with(["branch_offices" => $branchOffice, "head_offices" => $head_offices]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchOffice $branchOffice)
    {

        if ($branchOffice->province == $request->province) {
            $validatedata = $request->validate([
                'branch_name' => "required|string",
                'city_or_regency' => "required|string",
                'district' => "required|string",
                'village' => "required|string",
                'rt_and_rw' => "required|numeric",
                'street_or_building_name' => "required",
                'phone_number' => "required|numeric",
                'head_id' => "required|numeric",
                'maxresort' => "required|numeric",
                'service_charge' => "required|numeric",
                'admin_charge' => "required|numeric",
                'comision_charge' => "required|numeric",
                'deposite' => "required|numeric",
            ]);

        } else {
            $validatedata = $request->validate([
                'branch_name' => "required|string|unique:branch_offices,branch_name",
                'city_or_regency' => "required|string",
                'district' => "required|string",
                'village' => "required|string",
                'rt_and_rw' => "required|numeric",
                'street_or_building_name' => "required",
                'phone_number' => "required|numeric",
                'head_id' => "required|numeric",
                'maxresort' => "required|numeric",
                'service_charge' => "required|numeric",
                'admin_charge' => "required|numeric",
                'comision_charge' => "required|numeric",
                'deposite' => "required|numeric",
            ]);

        }

        $branchOffice->update($validatedata);

        return redirect()->route("branch_offices")->with("success", "Success update Branch Office Data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchOffice $branchOffice)
    {
        $branchOffice->delete();

        return response()->json(["message" => "success"], 200);
    }

}
