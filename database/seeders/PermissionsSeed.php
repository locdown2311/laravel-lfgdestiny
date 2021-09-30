<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\PermissionRegistrar;
class PermissionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create activity']);
        Permission::create(['name' => 'view activity']);
        Permission::create(['name' => 'join activity']);
        Permission::create(['name' => 'finish activity']);
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);
        Permission::create(['name' => 'manage users']);

        // create roles and assign existing permissions
        $role_admin = Role::create(['name' => 'admin']);
        $role_admin->givePermissionTo('create activity');
        $role_admin->givePermissionTo('view activity');
        $role_admin->givePermissionTo('join activity');
        $role_admin->givePermissionTo('finish activity');
        $role_admin->givePermissionTo('create category');
        $role_admin->givePermissionTo('edit category');
        $role_admin->givePermissionTo('delete category');
        $role_admin->givePermissionTo('manage users');

        $role_user = Role::create(['name' => 'user']);
        $role_user->givePermissionTo('create activity');
        $role_user->givePermissionTo('view activity');
        $role_user->givePermissionTo('join activity');
        $role_user->givePermissionTo('finish activity');

        $role_banido = Role::create(['name' => 'suspenso']);
        $role_banido->givePermissionTo('view activity');

        $user = User::findOrFail(1);
        $user->assignRole($role_admin);
        $banido = User::findOrFail(2);
        $banido->assignRole($role_banido);

    }
}
