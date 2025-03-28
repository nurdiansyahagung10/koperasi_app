<?php

namespace App\Http\Controllers;

use App\Models\HeadOffice;
use Illuminate\Http\Request;

class HeadOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.head_offices.head_offices", ["tittle" => "Management Head Office"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.pages.head_offices.head_offices_create", ["tittle" => "Add Head Office"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'province' => "required|string|unique:head_offices,province",
            'city_or_regency' => "required|string",
            'district' => "required|string",
            'village' => "required|string",
            'rt_and_rw' => "required|numeric",
            'street_or_building_name' => "required",
            'phone_number' => "required|numeric",
        ]);

        HeadOffice::create($validatedata);

        return redirect()->route("head_offices")->with("success", "Success Add Head Office Data");
    }

    /**
     * Display the specified resource.
     */
    public function show(HeadOffice $headOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeadOffice $headOffice)
    {
        return view("dashboard.pages.head_offices.head_offices_edit", ["head_offices" => $headOffice, "tittle" => "Edit Head Office"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeadOffice $headOffice)
    {

        $validatedata = $request->validate([
            'province' => "required|string",
            'city_or_regency' => "required|string",
            'district' => "required|string",
            'village' => "required|string",
            'rt_and_rw' => "required|numeric",
            'street_or_building_name' => "required",
            'phone_number' => "required|numeric",
        ]);

        if ($headOffice->province != $request->province && HeadOffice::where('province',$request->province)->get()->first()) {
            HeadOffice::where("province", $request->province)->update(['province' => $headOffice->province]);
        }

        $headOffice->update($validatedata);

        return redirect()->route("head_offices")->with("success", "Success update Head Office Data");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeadOffice $headOffice)
    {
        $headOffice->delete();

        return response()->json(["message" => "success"], 200);
    }
}
