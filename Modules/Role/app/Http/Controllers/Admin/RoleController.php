<?php

namespace Modules\Role\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Role\app\Repositories\RoleRepository;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct(protected RoleRepository $roleRepository)
    {
        $this->setActive('roles');
    }


    public function index()
    {
        $roles = $this->roleRepository->all();
        $permissions = Permission::all();
        return view('role::admin.index', compact('roles', 'permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required'
        ]);
        $role = $this->roleRepository->store($request->input('role_name'), $request->input('permissions'));
        $this->flushMessage($role);
        return back();
    }


    public function show($id)
    {
        $permissions = Permission::all();
        $role = $this->roleRepository->get($id);
        $users = User::type('admin')->whereDoesntHave('roles')->get();

        return view('role::admin.view', compact('role', 'users', 'permissions'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required'
        ]);
        $role = $this->roleRepository->update($id, $request->input('role_name'), $request->input('permissions'));
        $this->flushMessage($role);
        return back();
    }


    public function delete_role(Request $request, $id)
    {
        $role = $this->roleRepository->delete($id);
        $this->flushMessage($role);
        return redirect()->route('admin.roles.index');

    }

    public function assignUsersToRole(Request $request)
    {
        $assign = $this->roleRepository->assignUsersToRole($request->input('role_id'), $request->input('user_ids'));
        $this->flushMessage($assign);
        return back();
    }

    public function removeUsersFromRole(Request $request)
    {
        $assign = $this->roleRepository->removeUsersFromRole($request->input('role_id'), $request->input('user_ids'));
        $this->flushMessage($assign);
        return back();
    }

    public function removeUserFromRole(Request $request)
    {
        $this->roleRepository->removeUserFromRole($request->input('role_id'), $request->input('user_id'));
        return response()->json(['success' => 'User removed from role successfully.']);
    }

}
