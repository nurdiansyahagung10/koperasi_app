<?php

namespace App\Http\Controllers;

use App\Models\advance_payment;
use Auth;
use Illuminate\Http\Request;
use App\Models\HeadOffice;

class AdvancePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pages.advance_payment.advance_payment');
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
            'branch_id' => "required|integer",
            'pdl_id' => "required|string",
            'balance' => "required|integer",
        ]);


        $validatedata["user_id"] = Auth::id();

        advance_payment::create($validatedata);

        return redirect()->route("advance_payments.create" )->with("success", "Success Add Pdl Data");
    }

    /**
     * Display the specified resource.
     */
    public function show(advance_payment $advance_payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(advance_payment $advance_payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, advance_payment $advance_payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(advance_payment $advance_payment)
    {
        //
    }
}
