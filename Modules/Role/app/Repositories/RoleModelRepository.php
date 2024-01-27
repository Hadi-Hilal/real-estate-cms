<?php

namespace Modules\Role\app\Repositories;

use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

class RoleModelRepository implements RoleRepository
{
    private $roleModel;

    public function __construct(Role $roleModel)
    {
        $this->roleModel = $roleModel;
    }

    public function all(): Collection
    {
        return collect(Role::all());
    }

    public function store(string $name, array $permissions): ?Role
    {
        try {
            $role = Role::create(["name" => $name]);
            $role->syncPermissions($permissions);
            return $role;
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return null;
        }
    }

    public function update(int $id, string $name, array $permissions): ?Role
    {
        try {
            $role = $this->roleModel->findById($id);
            $role->update(["name" => $name]);
            $role->syncPermissions($permissions);
            return $role;
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return null;
        }
    }

    public function delete(int $id): ?bool
    {
        try {
            $role = $this->roleModel->findById($id);
            $role->delete();
            return true;
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return false;
        }
    }

    function assignUsersToRole(int $id, array $userIds): bool
    {
        try {
            $role = Role::findOrFail($id);
            $users = User::whereIn('id', $userIds)->get();
            $role->users()->attach($users);
            return true;
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return false;
        }
    }

    public function get(int $id): ?Role
    {
        try {
            return $this->roleModel->findById($id);
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return null;
        }
    }

    function removeUsersFromRole(int $id, array $userIds): bool
    {
        try {
            $role = Role::findOrFail($id);
            $users = User::whereIn('id', $userIds)->get();
            $role->users()->detach($users);
            return true;
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return false;
        }
    }

    public function removeUserFromRole(int $id, int $userId): bool
    {
        try {
            $user = User::findOrFail($userId);
            $role = Role::findOrFail($id);
            $user->roles()->detach($role);
            return true;
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return false;
        }
    }
}
