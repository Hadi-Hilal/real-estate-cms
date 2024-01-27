<?php

namespace Modules\Role\app\Repositories;

use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

interface RoleRepository
{
    function all(): Collection;

    function get(int $role): ?Role;

    function store(string $name, array $permissions): ?Role;

    function update(int $role, string $name, array $permissions): ?Role;

    function delete(int $role): ?bool;

    function assignUsersToRole(int $role, array $userIds): bool;

    function removeUsersFromRole(int $role, array $userIds): bool;

    function removeUserFromRole(int $role, int $userId): bool;
}
