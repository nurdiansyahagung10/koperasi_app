<?php

namespace App\Http\Controllers;

use App\Models\advance_payment;
use App\Models\Pdl;
use Auth;
use Illuminate\Http\Request;
use App\Models\HeadOffice;
use App\Models\DetailResort;

class AdvancePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pages.advance_payment.advance_payment', ["tittle" => "Management Advance Payment"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $head_offices = HeadOffice::all();

        return view('dashboard.pages.advance_payment.advance_payment_create')->with(['head_offices' => $head_offices]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate(rules: [
            "detail_resort_id" => "required|integer",
            'balance' => "required|integer",
            'proof_advance_payment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $detail_resort = DetailResort::with("resorts")->find($request->detail_resort_id);

        $validatedata["user_id"] = Auth::id();
        $validatedata["pdl_id"] = $detail_resort->resorts->pdl_id;

        if ($request->hasFile('proof_advance_payment')) {
            $validatedata['proof_advance_payment'] = $request->file('proof_advance_payment')->store('img/advance_payment', 'public');
        }


        advance_payment::create($validatedata);

        return redirect()->route("advance_payments")->with("success", "Success Add Advance Payment Data");
    }

    /**
     * Display the specified resource.
     */
    public function show(advance_payment $advance_payment)
    {
        return view("dashboard.pages.advance_payment.advance_payment_show")->with(["advance_payment"=> $advance_payment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(advance_payment $advance_payment)
    {
        $head_offices = HeadOffice::all();
        $advance_payment_with_relations = advance_payment::with("pdl.branch_office.head_offices")->find($advance_payment->id);
        return view('dashboard.pages.advance_payment.advance_payment_edit')->with(['head_offices' => $head_offices, "advance_payment" => $advance_payment_with_relations]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, advance_payment $advance_payment)
    {
        $validatedata = $request->validate(rules: [
            'balance' => "required|integer",
            'proof_advance_payment' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('proof_advance_payment')) {
            $validatedata['proof_advance_payment'] = $request->file('proof_advance_payment')->store('img/advance_payment', 'public');
        }

        $advance_payment->update($validatedata);

        return redirect()->route("advance_payments")->with("success", "Success Edit Advance Payment Data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(advance_payment $advance_payment)
    {
        //
    }
}
