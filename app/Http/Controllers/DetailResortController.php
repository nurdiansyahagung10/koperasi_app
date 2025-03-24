<?php

namespace App\Http\Controllers;

use App\Models\DetailResort;
use Illuminate\Http\Request;
use App\Models\Resort;

class DetailResortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($resort_id)
    {

        return view("dashboard.pages.branch_offices.resort.detailresort.detailresort", ["resort_id" => $resort_id, "tittle" => "Management Detail Resort"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($resort_id)
    {
        $day_code = ["A", "B", "C", "D", "E", "F"];
        $detailresort = DetailResort::where("resort_id", $resort_id)->get();
        if ($detailresort) {
            foreach ($detailresort as $value) {
                $day_code = array_diff($day_code, array("$value->day_code"));
            }
        }



        return view("dashboard.pages.branch_offices.resort.detailresort.detailresort_create", ["day_code" => $day_code, "resort_id" => $resort_id, "tittle" => "Create Detail Resort"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $resort_id)
    {
        $detailresortcheckdaycode = DetailResort::where(["resort_id" => $resort_id, "day_code" => $request->day_code])->get();
        if (!$detailresortcheckdaycode->isEmpty()) {
            return redirect()->back()->withErrors("That Day Code Has Used");
        }
        $validatedata = $request->validate([
            'day_code' => "string|required",
        ]);

        $validatedata["resort_id"] = $resort_id;

        DetailResort::create($validatedata);

        return redirect()->route("detailresorts", ["resort_id" => $resort_id])->with("success", "Success Add Detail Resort Data");

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $resort_id, $id)
    {
        $day_code = ["A", "B", "C", "D", "E", "F"];

        $detailresort = DetailResort::find($id);

        return view("dashboard.pages.branch_offices.resort.detailresort.detailresort_edit", ["day_code" => $day_code, "resort_id" => $resort_id, "detailresort" => $detailresort, "tittle" => "Edit Detail Resort"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $resort_id, $id)
    {

        $validatedata = $request->validate([
            'day_code' => "string|required",
        ]);

        $detailresort = DetailResort::find($id);

        if ($request->day_code != $detailresort->day_code) {
            $detailresortcheckdaycode = DetailResort::where(["resort_id" => $resort_id, "day_code" => $request->day_code])->first();

            if ($detailresortcheckdaycode) {
                $detailresortcheckdaycode->update(["day_code" => $detailresort->day_code]);
            }
        }

        $validatedata["resort_id"] = $resort_id;

        $detailresort->update($validatedata);

        return redirect()->route("detailresorts", ["resort_id" => $resort_id])->with("success", "Success Edit Detail Resort Data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detailResort = DetailResort::findOrFail($id);
        $detailResort->delete();

        return response()->json(["message" => "success"], 200);

    }
}
