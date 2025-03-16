<?php

namespace App\Http\Controllers;

use App\Models\Pdl;
use Illuminate\Http\Request;
use App\Models\HeadOffice;

class PdlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.employees.branch.pdl.pdl", ["tittle" => "Management Pdl"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $head_offices = HeadOffice::all();

        return view('dashboard.pages.employees.branch.pdl.pdl_create')->with(['head_offices' => $head_offices]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate(rules: [
            'head_id' => "required|integer",
            'branch_id' => "required|integer",
            'pdl_name' => "required|string",
            'basic_salary' => "required|integer",
            'hometown' => "required",
            'phone_number' => "required|numeric",
            'sk' => "required|string",
        ]);


        $validatedata["salary_date"] = date("d");

        Pdl::create($validatedata);

        return redirect()->route("pdls", )->with("success", "Success Add Pdl Data");

    }

    /**
     * Display the specified resource.
     */
    public function show(Pdl $pdl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pdl $pdl)
    {
        $head_offices = HeadOffice::all();

        return view("dashboard.pages.employees.branch.pdl.pdl_edit")->with(["pdl" => $pdl, "head_offices" => $head_offices]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pdl $pdl)
    {

        $validatedata = $request->validate(rules: [
            'head_id' => "required|integer",
            'branch_id' => "required|integer",
            'pdl_name' => "required|string",
            'basic_salary' => "required|integer",
            'hometown' => "required",
            'phone_number' => "required|numeric",
            'sk' => "required|string",
        ]);


        $pdl->update($validatedata);

        return redirect()->route("pdls")->with("success", "Success Edit Pdl Data  ");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pdl $pdl)
    {
        $pdl->delete();

        return response()->json(["message" => "success"], 200);
    }
}
