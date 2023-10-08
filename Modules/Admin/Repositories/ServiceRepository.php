<?php

namespace Modules\Admin\Repositories;

use App\Models\Category;
use App\Models\SelectGroup;
use Illuminate\Http\Request;
use Modules\Core\Repositories\Api\BaseRepository;

class ServiceRepository extends BaseRepository
{

    public function getQuery()
    {
        $q = parent::getQuery(); // TODO: Change the autogenerated stub
        if(\request()->get('active'))
            return $q->where('is_active', 1);

        return $q;
    }

    public function saving($model, Request $request)
    {

        SelectGroup::whereIn('id', pluck($request->select_group, 'id'))->update([
            'service_id' => $model->id
        ]);

        return parent::saving($model, $request); // TODO: Change the autogenerated stub
    }

}
