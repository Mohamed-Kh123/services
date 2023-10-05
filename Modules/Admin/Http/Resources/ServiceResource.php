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
            'description' => html_to_text_multilingual(),
            'is_active' => $this->is_active,
            'category_name' => optional($this->category)->name,
            'category_id' => $this->category_id,
            'order_determine_types' => $this->order_determine_types,
            'order_determine_types_name' => get($this->constant, 'name')
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
