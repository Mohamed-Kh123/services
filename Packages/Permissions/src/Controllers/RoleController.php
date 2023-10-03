<?php

namespace Permissions\Controllers;

use Modules\Core\Http\Controllers\BaseController;
use Permissions\Models\Role;
use Permissions\Repositories\RoleRepository;
use Permissions\Resources\RoleResource;

class RoleController extends BaseController
{

    protected $guard = "admin-api";
    protected $module = "admin";

    public $model = Role::class;

    protected $repository = RoleRepository::class;

    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setResource(RoleResource::class);
        $this->setRepository(RoleRepository::class);
    }

    public function index()
    {
        $model = $this->repositoryInstance->setModel($this->model)->setResource($this->resource)->customQuery(function ($query){
            $query->where('guard_name',$this->guard);
        })->all();
        return response()->api(SUCCESS_STATUS, trans('core::lang.fetched_successfully', ['attribute' => $this->alertMessage()]), $model);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $model = $this->__getRepository()->find($id);
        return response()->api(SUCCESS_STATUS, trans('core::messages.fetched_successfully', ['attribute' => $this->alertMessage()]), (new RoleResource($model))->serializeForEdit(request()));
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        $permissions = config("roles.$this->module");
//        dd($permissions);
        return response()->api(SUCCESS_STATUS, trans('core::messages.fetched_successfully', ['attribute' => $this->alertMessage()]), $permissions);
    }


}
