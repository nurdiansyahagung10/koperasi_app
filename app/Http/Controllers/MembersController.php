<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Auth;
use App\Models\HeadOffice;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.members.members");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user()->with('role')->get()->first();

        $head_offices = HeadOffice::all();
        return view("dashboard.pages.members.members_create")->with(["role" => $user->role->role_name, "head_offices" => $head_offices]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validatedata = $request->validate([
            'member_name' => 'required|string|max:255',
            'birthday_date' => 'required|date',
            'province' => 'required|string|max:255',
            'city_or_regency' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'rt_and_rw' => 'required|max:4',
            'phone_number' => 'required|string|max:13',
            'street_or_building_name' => 'required|string',
            'ktp' => 'required|integer',
            'kk' => 'required|integer',
            'member_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'member_ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'member_hold_ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'business' => 'required|string',
            'business_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'business_location' => 'required|string|max:255',
            'detail_resort_id' => 'required|numeric'
        ]);

        $validatedata["user_id"] = Auth::id();

        if ($request->hasFile('member_image')) {
            $validatedata['member_image'] = $request->file('member_image')->store('img/members', 'public');
        }

        if ($request->hasFile('member_ktp_image')) {
            $validatedata['member_ktp_image'] = $request->file('member_ktp_image')->store('img/members', 'public');
        }

        if ($request->hasFile('member_hold_ktp_image')) {
            $validatedata['member_hold_ktp_image'] = $request->file('member_hold_ktp_image')->store('img/members', 'public');
        }

        if ($request->hasFile('business_image')) {
            $validatedata['business_image'] = $request->file('business_image')->store('img/members', 'public');
        }

        Members::create($validatedata);


        return redirect()->route("members")->with("success", "Success Add Members Data");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $members = Members::with("detail_resorts.resorts.branch_offices.head_offices")->find($id);
        return view("dashboard.pages.members.members_show")->with("members", $members);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $members = Members::with("detail_resorts.resorts")->find($id);
        $user = Auth::user()->with('role')->get()->first();


        return view('dashboard.pages.members.members_edit')->with(["members" => $members, "role" => $user->role->role_name]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedata = $request->validate([
            'member_name' => 'required|string|max:255',
            'birthday_date' => 'required|date',
            'province' => 'required|string|max:255',
            'city_or_regency' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'rt_and_rw' => 'required|max:4',
            'phone_number' => 'required|string|max:13',
            'street_or_building_name' => 'required|string',
            'ktp' => 'required|integer',
            'kk' => 'required|integer',
            'business' => 'required|string',
            'business_location' => 'required|string|max:255',
            'detail_resort_id' => 'required|numeric'
        ]);

        $validatedata["user_id"] = Auth::id();

        if ($request->hasFile('member_image')) {
            $validatedata['member_image'] = $request->file('member_image')->store('img/members', 'public');
        }

        if ($request->hasFile('member_ktp_image')) {
            $validatedata['member_ktp_image'] = $request->file('member_ktp_image')->store('img/members', 'public');
        }

        if ($request->hasFile('member_hold_ktp_image')) {
            $validatedata['member_hold_ktp_image'] = $request->file('member_hold_ktp_image')->store('img/members', 'public');
        }

        if ($request->hasFile('business_image')) {
            $validatedata['business_image'] = $request->file('business_image')->store('img/members', 'public');
        }

        Members::find($id)->update($validatedata);


        return redirect()->route("members")->with("success", "Success Edit Members Data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Members::find($id)->delete();

        return response()->json(["message" => "success"], 200);
    }
}
