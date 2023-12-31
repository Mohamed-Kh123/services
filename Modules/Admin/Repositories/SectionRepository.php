<?php

namespace Modules\Admin\Repositories;

use App\Models\Category;
use App\Models\SelectGroup;
use Illuminate\Http\Request;
use Modules\Core\Repositories\Api\BaseRepository;

class SectionRepository extends BaseRepository
{
    public function saving($model, Request $request)
    {
        $model->sliders()->sync(pluck($request->images,'id'));
        $model->categories()->sync($request->categories);
        $model->services()->sync($request->services);
        return parent::saving($model, $request); // TODO: Change the autogenerated stub
    }
}
