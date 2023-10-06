<?php

namespace Modules\Customer\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\BaseController;
use Modules\Customer\Http\Resources\CategoryResource;

class MainController extends Controller
{


    public function index()
    {
        $data = [];
        $this->serializeForCategory($data);
        return response()->api(SUCCESS_STATUS, trans('core::messages.fetched_successfully'),
            $data
        );
    }

    public function serializeForCategory(&$data)
    {
        $data['categories'] = Category::all()->mapInto(CategoryResource::class)->toArray();
    }

}
