<?php


namespace Modules\Admin\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Resources\AttachmentResource;
use Modules\Core\Http\Resources\BaseResource;
use App\Models\Admin;

class SectionResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *'name', 'type', 'data', 'ordered', 'is_active'
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->getTranslations('name'),
            'type' => $this->type,
            'ordered' => $this->ordered,
            'is_active' => $this->is_active,
            'image_url' => $this->data && $this->data['images'] ? image_url($this->data['images'], '', true) : null,
            'services' => $this->services ? pluck($this->services, 'id') : [],
            'categories' => $this->categories ? pluck($this->categories, 'id') : [],
            'images' => $this->sliders ? AttachmentResource::collection($this->sliders) : []
        ];
    }


}
