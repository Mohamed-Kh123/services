<?php

namespace Modules\Admin\Http\Controllers;
use App\Models\Admin;
use Modules\Core\Http\Controllers\AuthController as BaseAuthController;
class AuthController extends BaseAuthController
{
    public $model = Admin::class;
    public $guard = ADMIN_GUARD;
}
