<?php

namespace Modules\Api\Http\Controllers;
use App\Models\Admin;
use App\Models\Customer;
use Modules\Core\Http\Controllers\AuthController as BaseAuthController;
class AuthController extends BaseAuthController
{
    public $model = Customer::class;
    public $guard = CUSTOMER_GUARD;
}
