<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Resources\AdminsResource;
use Modules\Core\Http\Controllers\BaseController;

class AdminsController extends BaseController
{
    public $model = Admin::class;
    public $resource = AdminsResource::class;
}
