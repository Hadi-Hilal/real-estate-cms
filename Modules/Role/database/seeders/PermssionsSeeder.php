<?php

namespace Modules\Role\database\seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermssionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'Manage Settings', 'guard_name' => 'web'],
            ['name' => 'Manage Roles', 'guard_name' => 'web'],
            ['name' => 'Manage Testimonials', 'guard_name' => 'web'],
            ['name' => 'Manage Subscribers', 'guard_name' => 'web'],
            ['name' => 'Manage Users', 'guard_name' => 'web'],
        ];

//        DB::table('permissions')->insert($permissions);
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'type' => 'admin',
            'super_admin' => true,
            'password' => bcrypt('12345678'),
        ]);
        $role = Role::firstOrCreate(['name' => 'Admin']);
        $permissions = Permission::pluck('name');
        $role->syncPermissions($permissions);
        $user->assignRole('Admin');

        // $this->call([]);
    }
}
