<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function index()
    {
        return view("dashboard.pages.roles", ["tittle" => "Manajemen Roles"]);

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
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }

    public function permissions(Role $role)
    {
        return view("dashboard.pages.permissions", ["tittle"=> "Management Permissions"]);
    }

    public function set_permissions(Request $request, Role $role)
    {
        $databefore = null;
        $data = $request->all();
        if ($data) {
            $param = array_keys($data)[0];
            if ($data["type"] == "add") {
                $databeforeandnow = $role->permissions . $data[$param];
            } else {
                $databefore = explode(",", $role->permissions);
                foreach($databefore as $key => $value){
                    if($value == substr($data[$param], 0,1)){
                        unset($databefore[$key]);
                    }
                }
                $databeforeandnow = implode(",", $databefore);
            }
            $role->update([$param => $databeforeandnow == "" ? null : $databeforeandnow]);
        }
        return response()->json(["succes"], 200);
    }
}
