<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 创建默认的权限
        $allPermission = [
            'brand',
            'category',
            'operator',
            'phone_model',
            'product',
            'sim_card',
            'supplier',
            'user'
        ];

        $actions = [
            'view',
            'create',
            'update',
            'delete'
        ];

        foreach ($allPermission as $permission) {
            foreach ($actions as $action) {
                Permission::create(['name' => $action . ' ' . $permission]);
            }
        }

        // 创建默认的角色
        // 1. Super Admin 超级管理员, 拥有所有权限
        $role1 = Role::create(['name' => 'Super Admin']);
        // 2. Admin 管理员 权限: 用户管理(不包含权限和角色), 运营商管理, 商店管理, 手机型号
        /**
         * @var Role $role2
         */
        $role2 = Role::create(['name' => 'Admin']);
        foreach ($allPermission as $permission) {
            foreach ($actions as $action) {
                $role2->givePermissionTo($action . ' ' . $permission);
            }
        }
        // 3. Reception 前台 权限: 商店管理, SIM, 供应商查看
        /**
         * @var Role $role3
         */
        $role3 = Role::create(['name' => 'Reception']);
        $role3->givePermissionTo('view category');
        $role3->givePermissionTo('create category');
        $role3->givePermissionTo('update category');
        $role3->givePermissionTo('delete category');

        $role3->givePermissionTo('view product');
        $role3->givePermissionTo('create product');
        $role3->givePermissionTo('update product');
        $role3->givePermissionTo('delete product');

        $role3->givePermissionTo('view sim_card');
        $role3->givePermissionTo('create sim_card');
        $role3->givePermissionTo('update sim_card');
        $role3->givePermissionTo('delete sim_card');

        $role3->givePermissionTo('view supplier');
        $role3->givePermissionTo('view phone_model');

        /**
         * @var User $admin_user
         */
        $admin_user = User::factory()->create([
            'name' => 'admin',
            'email' => 'xin@admin.com',
            'password' => Hash::make('123456')
        ]);

        $admin_user->assignRole($role1);
    }
}
