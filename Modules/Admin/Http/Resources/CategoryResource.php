<?php


namespace Modules\Admin\Http\Resources;

use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Resources\BaseResource;
use App\Models\Admin;

class CategoryResource extends BaseResource

{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        return [
            'id' => $this->id,
            'name' => $this->getTranslations('name'),
            'description' => $this->getTranslations('description'),
            'is_active' => $this->is_active,
            'is_active_label' => $this->is_active == 1 ? trans('admin::messages.active_label') : trans('admin::messages.in_active_label'),
        ];
    }


}
