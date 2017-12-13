<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use App\Permission;
use App\Role;

class GuardianController extends Controller
{
    public function index()
    {
        $roles             = Role::orderBy('name', 'ASC')->get();
        $permissions       = Permission::orderBy('name', 'ASC')->get();
        $groupsPermissions = Permission::getGroupsOfPermissions();

        return view('guardian.index', compact([
            'roles',
            'permissions',
            'groupsPermissions'
        ]));
    }

    public function roleStore(RolesRequest $request)
    {
        return $request->all();
    }
}
