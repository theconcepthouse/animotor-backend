<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('permissions')->truncate();
        DB::table('permission_role')->truncate();
        DB::table('permission_user')->truncate();

        $resources = [
        'regions', 'settings', 'users', 'roles', 'vehicle_types', 'vehicle_makes','admins',
        'vehicle_models', 'countries', 'complains', 'documents', 'cars',
        'rental','companies', 'cancellation_reasons', 'services', 'pages'];

        $owner_permissions = [
            'roles-read',
            'users-read',
            'admins-read',
            'rental-read',
            'cars-read',
            'rental-read',
            'drivers-read',
            'trips-read',
            'bookings-index',
            'complains-read',
            'admin-dashboard',
            'admins-users',
        ];

        $managers_permissions = [
            'users-read',
            'cars-read',
            'rental-read',
            'drivers-read',
            'trips-read',
            'bookings-index',
            'complains-read',
            'admin-dashboard',
        ];

        $more_permissions = [
            'legal',
            'website-pages',
            'settings-components',
            'settings-pages',
            'cms-setup',
            'configurations',
            'settings-services',
            'roles-index',
            'bookings-index',
            'drivers-read',
            'trips-read',
            'admin-dashboard',
            'admins-users',
        ];



        $permissions= [];


        foreach ($more_permissions as $item) {

            // Check if the permission already exists
            if (!Permission::where('name', $item)->exists()) {
                $permission = [
                    'name' => $item,
                    'display_name' => str_replace('-',' ',$item),
                    'description' => ucfirst(str_replace('-',' ',$item)),
                ];

                $permissions[] = Permission::create($permission)->id;

            }
        }

        $role = Role::where('name','admin')->first();
        $super = Role::where('name','superadmin')->first();


//        $role->syncPermissions($morePerm);
//        $super->syncPermissions($morePerm);

        $owner = Role::where('name','owner')->first();

        $manager = Role::where('name','manager')->first();

        if(!$owner){
            $owner = Role::create([
                'name' => 'owner',
                'display_name' => 'Owner',
                'description' => 'Owner',
            ]);

            $owner = Role::where('name','owner')->first();
        }

        if(!$manager){
            Role::create([
                'name' => 'manager',
                'display_name' => 'Manager',
                'description' => 'Manager',
            ]);

            $manager = Role::where('name','manager')->first();
        }


        foreach ($resources as $resource) {
            $permissions =  array_merge($permissions, $this->createResourcePermissions($resource));
        }

        $role->syncPermissions($permissions);
        $super->syncPermissions($permissions);

        $owner_permission_ids = Permission::whereIn('name', $owner_permissions)->pluck('id')->toArray();

        $manager_permission_ids = Permission::whereIn('name', $managers_permissions)->pluck('id')->toArray();


        $owner->syncPermissions($owner_permission_ids);
        $manager->syncPermissions($manager_permission_ids);

    }

    private function createResourcePermissions($resource)
    {
        $crudActions = ['create', 'read', 'update', 'delete'];

        $createdPermissions = [];
        foreach ($crudActions as $action) {
            $permissionName = $resource . '-' . $action;

            // Check if the permission already exists
            if (!Permission::where('name', $permissionName)->exists()) {
                $permission = [
                    'name' => $permissionName,
                    'display_name' => ucfirst($action) . ' ' . ucfirst($resource),
                    'description' => ucfirst($action) . ' ' . ucfirst($resource),
                ];

                $createdPermissions[] = Permission::create($permission)->id;
            }
        }

        return $createdPermissions;

    }
}
