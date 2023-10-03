<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\BaseController;
use Permissions\Controllers\RoleController as ControllersRoleController;
use Permissions\Models\Permission;

class RoleController extends ControllersRoleController
{
//public $model = Permission::class;
}
