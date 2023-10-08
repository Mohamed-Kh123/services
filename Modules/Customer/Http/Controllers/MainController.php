<?php

namespace Modules\Customer\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\BaseController;
use Modules\Customer\Http\Resources\CategoryResource;
use Modules\Customer\Http\Resources\SectionResource;

class MainController extends Controller
{


    public function index()
    {
        $data = [];
        $this->serializeForSection($data);
        return response()->api(SUCCESS_STATUS, trans('core::messages.fetched_successfully'),
            $data
        );
    }

    public function serializeForSection(&$data)
    {
        $data['sections'] = Section::orderBy('ordered', 'ASC')->get()->mapInto(SectionResource::class)->toArray();
    }

}
