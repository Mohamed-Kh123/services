<?php


namespace Permissions\Repositories;

use App\Models\Constant;
use App\Models\Owner;
use Illuminate\Http\Request;
use Modules\Core\Repositories\Api\BaseRepository;
use Permissions\Models\Permission;
use Permissions\Resources\RoleResource;

class RoleRepository extends BaseRepository
{

    public $resource = RoleResource::class;





    /**
     * @param $model
     * @param Request $request
     * @return mixed
     */
    public function saving($model, Request $request)
    {
        $permissions = [];
        foreach ($request->permissions as $key => $permission) {
            $permissions = array_merge($permissions, array_map(function ($item) use ($key) {
                return $key . "." . $item;
            }, $permission));
        }
        // dd($permissions);
        $model->permissions()->sync(array_map(function ($permission) {
            $permissionModel = Permission::updateOrCreate(['name' => $permission]);
            // dd($permissionModel->id);
            return $permissionModel->id;
        }, $permissions));
        return parent::saving($model, $request);

   }
}
