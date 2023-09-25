<?php


namespace Modules\Admin\Http\Resources;

use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Resources\BaseResource;
use App\Models\Admin;

class ServiceResource extends BaseResource

{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->getTranslations('name'),
            'description' => $this->getTranslations('description'),
            'is_active' => $this->is_active,
            'price' => $this->price,
            'category_name' => $this->getLocale(optional($this->category)->name),
            'category_id' => $this->category_id,
        ];
    }


}
