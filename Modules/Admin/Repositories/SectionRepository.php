<?php

namespace Modules\Admin\Repositories;

use App\Models\Category;
use App\Models\SelectGroup;
use Illuminate\Http\Request;
use Modules\Core\Repositories\Api\BaseRepository;

class SectionRepository extends BaseRepository
{
    public function getAttributes(Request $request)
    {
        $data = parent::getAttributes($request); // TODO: Change the autogenerated stub
        if($request->get('images'))
            $data['data']['images'] = $request->images;

        return $data;
    }
}
