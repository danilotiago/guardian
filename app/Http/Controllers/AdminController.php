<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function seguranca()
    {
        $roles = Role::with('permissions')->orderBy('name', 'ASC')->get();
        return view('admin.seguranca', compact([
            'roles',
            'permissions'
        ]));
    }
}
