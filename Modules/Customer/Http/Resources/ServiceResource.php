<?php


namespace Modules\Customer\Http\Resources;

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
            'name' => $this->name,
            'description' => $this->description,
            'category_name' => optional($this->category)->name,
            'order_determine_types' => $this->order_determine_types,
            'image_url' => $this->image ? image_url($this->image) : null,
        ];
    }

    public function serializeForEdit($request)
    {
        return array_merge($this->toArray($request), [
            'counter_fields' => $this->counter_fields,
            'select_groups' => $this->selectGroups ? SelectGroupResource::collection($this->selectGroups) : []
        ]);
    }

}
