<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

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
}
