<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Permission List as array
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                ]
            ],
            [
                'group_name' => 'user',
                'permissions' => [
                    // user Permissions
                    'user.create',
                    'user.view',
                    'user.edit',
                    'user.delete',
                    'user.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                    'profile.delete',
                    'profile.update',
                ]
            ],
            [
                'group_name' => 'category',
                'permissions' => [
                    // category Permissions
                    'category.create',
                    'category.view',
                    'category.edit',
                    'category.delete',
                ]
            ],
            [
                'group_name' => 'subCategory',
                'permissions' => [
                    // subCategory Permissions
                    'subCategory.create',
                    'subCategory.view',
                    'subCategory.edit',
                    'subCategory.delete',
                ]
            ],
            [
                'group_name' => 'product',
                'permissions' => [
                    // product Permissions
                    'product.create',
                    'product.view',
                    'product.edit',
                    'product.delete',
                ]
            ],
            [
                'group_name' => 'transaction',
                'permissions' => [
                    // transaction Permissions
                    'transaction.view',
                ]
            ],
        ];

        $roleSuperAdmin = Role::create(['name' => 'superadmin']);


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {                
                $permission = Permission::create(
                        [
                            'name' => $permissions[$i]['permissions'][$j],
                            'group_name' => $permissionGroup,
                        ]
                    );
                    $roleSuperAdmin->givePermissionTo($permission);
                    $permission->assignRole($roleSuperAdmin);
                
            }
        }
        $user = User::where('email', 'admin@gmail.com')->first();
        if($user){
            $user->assignRole($roleSuperAdmin);
        }
    }
}