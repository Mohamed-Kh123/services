<?php

namespace Database\Seeders;

use App\Models\Constant;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{

    const CRUD = [
        [
            'title' => 'All {title}',
            'name' => '{name}-all',
        ],
        [
            'title' => 'Create {title}',
            'name' => '{name}-create',
        ],
        [
            'title' => 'Edit {title}',
            'name' => '{name}-edit',
        ],
        [
            'title' => 'Delete {title}',
            'name' => '{name}-delete',
        ]
    ];

    const DEFAULT_GUARD = 'employee-api';

    private $guard = self::DEFAULT_GUARD;

    private $module;

    private $permissions;

    /**
     * Run the database seeds.
     *
     * @param string $guard
     * @return void
     */
    public function run($guard = self::DEFAULT_GUARD)
    {
        $permissions = collect();

        $this->setGuard($guard)->modulePermissions()->each(function ($permission, $key) use (&$permissions) {
            if (count($permission) > 0)
                $permissions = $permissions->merge(collect($permission)->map(function ($item) use (&$permissions, $key) {
                    return $this->__generatePermission($item, $key);
                }));
        });

        $this->__savePermission($permissions)->__assignToRole();
    }


    /**
     * assign permissions to super admin role according to parsed guard
     *
     * @return mixed
     * @author WeSSaM
     */
    private function __assignToRole()
    {
        $superAdminRole = \Permissions\Models\Role::findOrCreate('employee', $this->guard);
        $superAdminRole->permissions()->sync($this->sanitizePermissionToSync());
        return $superAdminRole;
    }


    /**
     * @return mixed
     * @author WeSSaM
     */
    private function sanitizePermissionToSync()
    {
        return $this->permissions->pluck('id')->toArray();
    }


    /**
     * @param $child
     * @param $parent
     * @return array
     * @author WeSSaM
     */
    public function __generatePermission($child, $parent)
    {
        return [
            'name' => "$parent.$child",
            'title' => "$child $parent",
            'guard_name' => $this->guard
        ];
    }

    /**
     * save Permissions
     * @param $permissions
     * @return PermissionTableSeeder
     * @author Amr
     */
    function __savePermission($permissions)
    {

        $this->permissions = $permissions->map(function ($permission) {
            $permission = collect($permission);
            return \Permissions\Models\Permission::updateOrCreate($permission->only(['guard_name', 'name'])->toArray(), $permission->only('title')->toArray());
        });
        return $this;
    }


    /**
     * @param string $guard
     * @return PermissionTableSeeder
     */
    private function setGuard($guard)
    {
        $this->guard = $guard;
        return $this->setModule();
    }

    /**
     * sets the module's name based on current guard
     * @return PermissionTableSeeder
     */
    public function setModule()
    {
        $this->module = str_replace('-api', '', $this->guard);
        return $this;
    }


    /**
     * @return \Illuminate\Support\Collection
     * @author WeSSaM
     */
    private function modulePermissions()
    {
        return collect(config("roles.$this->module"));
    }
}
