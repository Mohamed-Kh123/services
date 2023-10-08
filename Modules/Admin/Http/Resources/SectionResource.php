<?php


namespace Modules\Admin\Http\Resources;

use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Resources\BaseResource;
use App\Models\Admin;

class SectionResource extends BaseResource

{
    /**
     * Transform the resource into an array.
     *'name', 'type', 'data', 'ordered', 'is_active'
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->getTranslation('name'),
            'type' => $this->type,
            'ordered' => $this->ordered,
            'is_active' => $this->is_active,
            'image_url' => $this->image ? image_url($this->image) : null,
        ];
    }


}
