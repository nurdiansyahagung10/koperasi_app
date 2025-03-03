<?php

namespace App\Http\Controllers;

use App\Models\LoanAplication;
use Illuminate\Http\Request;

class LoanAplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.loan_application.loan_application");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(LoanAplication $loanAplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanAplication $loanAplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoanAplication $loanAplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanAplication $loanAplication)
    {
        //
    }
}
