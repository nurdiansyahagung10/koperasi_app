<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use Illuminate\Http\Request;
use App\Models\Pdl;
use App\Models\BranchOffice;

class ResortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($branch_id)
    {
        return view("dashboard.pages.branch_offices.resort.resort")->with("branch_id", $branch_id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($branch_id)
    {
        $branch = BranchOffice::find($branch_id);
        $resortnumber = [];
        $pdl_id = [];
        for ($i = 1; $i <= $branch->maxresort; $i++) {
            array_push($resortnumber, $i);
        }
        $resort = Resort::where("branch_id", $branch_id)->get();
        if ($resort) {
            foreach ($resort as $value) {
                $resortnumber = array_diff($resortnumber, array("$value->resort_number"));
                array_push($pdl_id, $value->pdl_id);
            }
        }

        $pdl = Pdl::whereNotIn("branch_id", $pdl_id)->get();



        return view("dashboard.pages.branch_offices.resort.resort_create")->with(["pdl" => $pdl, "resortnumber" => $resortnumber, "branch_id" => $branch_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $branch_id)
    {
        $resortchecknumber = Resort::where(["branch_id" => $branch_id, "resort_number" => $request->resort_number])->get();
        $resortcheckpdl = Resort::where(["branch_id" => $branch_id, "pdl_id" => $request->pdl_id])->get()->first();
        if (count($resortchecknumber) != 0) {
            return redirect()->back()->withErrors("That Resort Number Has Used");
        } else if ($resortcheckpdl && $resortcheckpdl->pdl_id != Null) {
            return redirect()->back()->withErrors("That Pdl Has Have Resort");

        } else {
            $validatedata = $request->validate([
                'pdl_id' => "integer|nullable",
                'branch_id' => "integer|required",
                'resort_number' => "required|integer",
            ]);

            Resort::create($validatedata);

            return redirect()->route("resort", ["branch_id" => $branch_id])->with("success", "Success Add Resort Data");

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Resort $resort)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($branch_id, $id)
    {
        $branch = BranchOffice::find($branch_id);
        $resort = Resort::find($id);
        $resortnumber = [];
        $pdl_id = [];
        for ($i = 1; $i <= $branch->maxresort; $i++) {
            array_push($resortnumber, $i);
        }
        $resortcheck = Resort::where("branch_id", $branch_id)->get();
        if ($resortcheck) {
            foreach ($resortcheck as $value) {
                $resortnumber = array_diff($resortnumber, array("$value->resort_number"));
                array_push($pdl_id, $value->pdl_id);
            }
        }

        $pdl = Pdl::whereNotIn("branch_id", $pdl_id)->get();


        return view("dashboard.pages.branch_offices.resort.resort_edit")->with(["pdl" => $pdl, "resortnumber" => $resortnumber, "resort" => $resort, "branch_id" => $branch_id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$branch_id, $id)
    {   
        $resort = Resort::find($id);
        $resortchecknumber = Resort::where(["branch_id" => $branch_id, "resort_number" => $request->resort_number])->get();
        $resortcheckpdl = Resort::where(["branch_id" => $branch_id, "pdl_id" => $request->pdl_id])->get()->first();
        if (count($resortchecknumber) != 0 && $resort->resort_number != $request->resort_number) {
            return redirect()->back()->withErrors("That Resort Number Has Used");
        } else if ($resortcheckpdl && $resortcheckpdl->pdl_id != Null && $resort->pdl_id != $request->pdl_id->id) {
            return redirect()->back()->withErrors("That Pdl Has Have Resort");
        } else {
            $validatedata = $request->validate([
                'pdl_id' => "integer|nullable",
                'branch_id' => "integer|required",
                'resort_number' => "required|integer",
            ]);
            
                $resort->update($validatedata);

            return redirect()->route("resort", ["branch_id" => $branch_id])->with("success", "Success Edit Resort Data");

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resort $resort)
    {
        $resort->delete();

        return response()->json(["message" => "success"], 200);
    }
}
