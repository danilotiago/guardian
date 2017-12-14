<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionsRequet;
use App\Http\Requests\RolesRequest;
use App\Http\Requests\UsersRequest;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Session;

class GuardianController extends Controller
{
    public function index()
    {
        $users             = User::orderBy('name', 'ASC')->get();
        $roles             = Role::orderBy('name', 'ASC')->get();
        $permissions       = Permission::orderBy('name', 'ASC')->get();
        $groupsPermissions = Permission::getGroupsOfPermissions();

        return view('guardian.index', compact([
            'users',
            'roles',
            'permissions',
            'groupsPermissions'
        ]));
    }

    public function userStore(UsersRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        // caso foi vinculado permissoes
        if(isset($data['roles']))
        {
            $user->roles()->sync($data['roles']);
        }

        Session::flash('success', 'Usuário cadastrado com sucesso');
        return redirect()->route('guardian');
    }

    public function roleStore(RolesRequest $request)
    {
        $data = $request->all();
        $data['identify'] = create_slug($data['name']);
        $role = Role::create($data);

        // caso foi vinculado permissoes
        if(isset($data['permissions']))
        {
            $role->permissions()->sync($data['permissions']);
        }

        Session::flash('success', 'Função cadastrada com sucesso');
        return redirect()->route('guardian');
    }

    public function permissionStore(PermissionsRequet $request)
    {
        $data = $request->all();
        $data['identify'] = create_slug($data['name']);

        // caso nao seja selecionado nenhum grupo e um novo grupo seja enviado
        if(!isset($data['group']) && isset($data['new_group']))
        {
            $data['group'] = $data['new_group'];
        }

        $permission = Permission::create($data);

        /*// caso foi vinculado permissoes
        if(isset($data['roles']))
        {
            $permission->roles()->sync($data['roles']);
        }*/

        Session::flash('success', 'Permissão cadastrada com sucesso');
        return redirect()->route('guardian');
    }
}
