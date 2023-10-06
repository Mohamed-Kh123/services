<?php

namespace Modules\Customer\Http\Controllers;


use App\Models\Admin;
use App\Models\Customer;
use Modules\Core\Http\Controllers\AuthController as BaseAuthController;
use Modules\Customer\Http\Resources\CustomerResource;

class AuthController extends BaseAuthController
{
    public $model = Customer::class;
    public $guard = CUSTOMER_GUARD;
    public $resource = CustomerResource::class;

    public function username()
    {
        return 'mobile';
    }

}
