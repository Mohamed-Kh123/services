<?php

namespace Modules\Customer\Repositories;

use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;
use Modules\Core\Repositories\Api\BaseRepository;

class OrderRepository extends BaseRepository
{
    protected function getAttributes(Request $request)
    {
        $data = parent::getAttributes($request); // TODO: Change the autogenerated stub
        $data['customer_id'] = userAuth()->id;
        $data['customer_data'] = userAuth();
        $data['service_data'] = Service::find($request->service_id);
        $data['total'] = $data['service_data']->total;
        return $data;
    }

}
